# config valid for current version and patch releases of Capistrano
# lock "~> 3.7.2"
# Application #
#####################################################################################
set :application,     "JUGAL"
set :branch,          ENV["branch"] || "master"
set :user,            ENV["user"] || ENV["USER"] || "jugal"
set :tmp_dir,         '/home/jugal/web/tmp'
# SCM #
#####################################################################################
set :repo_url, "git@gitlab.yipl.com.np:web-apps/jugal-mis.git"
set :repo_base_url,   :'http://gitlab.yipl.com.np/'
set :repo_diff_path,  :'web-apps/jugal-mis/compare/master...'
# Multistage Deployment #
#####################################################################################
set :stages,              %w(staging, prod)
set :default_stage,       "staging"
# Other Options #
#####################################################################################
set :ssh_options,         { :forward_agent => true }
set :default_run_options, { :pty => true }
# Permissions #
#####################################################################################
set :use_sudo,            false
set :permission_method,   :acl
set :use_set_permissions, true
set :webserver_user,      "www-data"
set :group,               "www-data"
set :keep_releases,       1
# NVM #
#####################################################################################
# set :nvm_type, :user # or :system, depends on your nvm setup
# set :nvm_node, 'v14.17.0'
# set :nvm_map_bins, %w{node npm yarn}


require 'date'
set :current_time, DateTime.now
namespace :environment do
    desc "Set environment variables"
    task :set_variables do
        on roles(:app) do
              puts ("--> Copying environment configuration file")
              execute "cp #{release_path}/.env.server #{release_path}/.env"
              puts ("--> Setting environment variables")
              execute "sed --in-place -f #{fetch(:overlay_path)}/parameters.sed #{release_path}/.env"
        end
    end
end
namespace :composer do
    desc "Running Composer Install"
    task :install do
        # skip this is in production
        if fetch(:stage).to_s === "staging"
            on roles(:app) do
                within release_path do
                    execute :composer, "install --no-dev --quiet"
                    execute :composer, "dump-autoload -o"
                end
            end
        else
            puts("Composer install skipped in production")
        end        
    end
end
namespace :app do
    desc "creates necessary folder for initial setup"
    task :create_storage_folder do
        on roles(:all) do
            execute "mkdir -p #{shared_path}/storage"
            execute "mkdir #{shared_path}/storage/app"
            execute "mkdir #{shared_path}/storage/framework"
            execute "mkdir #{shared_path}/storage/framework/cache"
            execute "mkdir #{shared_path}/storage/framework/sessions"
            execute "mkdir #{shared_path}/storage/framework/views"
            execute "mkdir #{shared_path}/storage/logs"
        end
    end
    task :create_overlay_folder do
        on roles(:all) do
            execute "mkdir -p #{deploy_to}/overlay"
        end
    end
    task :create_uploads_folder do
        on roles(:all) do
            execute "mkdir #{shared_path}/uploads"
        end
    end
end

namespace :devops do
    desc "Setup Application Directories"
    task :set_up do
        on roles(:all) do
            invoke "app:create_storage_folder"
            invoke "app:create_overlay_folder"
            invoke "app:create_uploads_folder"
        end
    end
    desc "Copy Parameter File(s)"
    task :copy do
        on roles(:all) do |host|
            %w[ parameters.sed ].each do |f|
            upload! "./config/deploy/parameters/#{fetch(:env)}/" + f , "#{fetch(:overlay_path)}/" + f
            end
        end
    end
end

namespace :phpapp do
    desc "Initial setup"
    task :set_up do
        on roles(:all) do
            invoke "devops:set_up"
            invoke "devops:copy"
        end
    end

    desc "Symbolic link for shared folders"
    task :create_symlink do
        on roles(:app) do
            within release_path do
                execute "rm -rf #{release_path}/storage"
                execute "ln -s #{shared_path}/storage/ #{release_path}"
                execute "ln -s #{shared_path}/uploads #{release_path}/public"
            end
        end
    end

    desc "Create ver.txt"
    task :create_ver_txt do
        on roles(:all) do
            puts ("--> Copying ver.txt file")
            execute "cp #{release_path}/config/deploy/ver.txt.example #{release_path}/public/ver.txt"
            execute "sed --in-place 's/%date%/#{fetch(:current_time)}/g
                        s/%branch%/#{fetch(:branch)}/g
                        s/%revision%/#{fetch(:current_revision)}/g
                        s/%deployed_by%/#{fetch(:user)}/g' #{release_path}/public/ver.txt"
            execute "find #{release_path}/public -type f -name 'ver.txt' -exec chmod 664 {} \\;"
        end
    end
end
namespace :vendor do
    desc 'Copy vendor directory from last release'
    task :copy do
        on roles(:web) do
            puts ("--> Copy vendor folder from previous release")
            execute "vendorDir=#{current_path}/vendor; if [ -d $vendorDir ] || [ -h $vendorDir ]; then cp -a $vendorDir #{release_path}/vendor; fi;"
            # execute "nodeDir=#{current_path}/node_modules; if [ -d $nodeDir ] || [ -h $nodeDir ]; then cp -a $nodeDir #{release_path}/node_modules; fi;"
        end
    end
end
namespace :nginx do
    desc 'Reload nginx server'
        task :reload do
            on roles(:all) do
            execute :sudo, :service, "nginx reload"
        end
    end
end
namespace :php_fpm do
    desc 'Reload php-fpm'
        # skip this is production
        task :reload do
            if fetch(:stage).to_s === "staging"
                on roles(:all) do
                    execute :sudo, :service, "php8.0-fpm reload"
                end
            else
                puts('fpm skipped in produciton')
            end        
    end
end
# namespace :node do
#     desc 'Compile JS and CSS assests'
#         task :install do
#             on roles(:all) do 
#                 within release_path do
#                     puts ("--> install node packages")
#                     execute :npm,"install"
#                 end
#             end
#         end

#         task :prod do
#             on roles(:all) do 
#                 within release_path do
#                     puts ("--> make production build")
#                     execute :npm,"run prod"
#                 end
#             end
#         end
# end

namespace :deploy do
    after :updated, "vendor:copy"
    after :updated, "composer:install"
    after :updated, "environment:set_variables"
    # after :updated, "node:install"
    # after :updated, "node:prod"
    after :published, "phpapp:create_symlink"
    after :finished, "phpapp:create_ver_txt"
end


after "deploy", "php_fpm:reload"
