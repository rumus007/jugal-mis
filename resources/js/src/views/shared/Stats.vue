<template>
    <div class="stats-section flex" id="Stats">
        <div class="stats stats-population">
            <strong>३०००००</strong>            
            <span>कुल जनसंख्या</span>
        </div>
        <div class="stats stats-family">
            <strong>३०००</strong>            
            <span>कुल परिवार</span>
        </div>
        <div class="stats stats-female">
            <strong>३२५</strong>            
            <span>महिला</span>
        </div>
        <div class="stats stats-male">
            <strong>५००</strong>            
            <span>पुरुष</span>
        </div>
        <div class="stats stats-third-gender">
            <strong>३०</strong>            
            <span>तेश्रो लिङ्गी</span>
        </div>
    </div>
</template>


<style scoped lang="scss">
    .stats {
        color: var(--color-primary-dark);
        padding-left: 68px;
        position: relative;
        &:before {
            background-color: rgba(168,216,255,0.5);
            background-image: url("../../../../../public/images/ic_sprite.svg");
            background-repeat: no-repeat;
            border-radius: 50%;
            content: "";
            height: 52px;
            left: 0;
            position: absolute;
            top: 2px;
            width: 52px;
        }
        &-section {
            background: var(--color-base);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            justify-content: space-between;
            padding: 24px 48px;
            position: relative;
        }

        strong {
            display: block;
            font-size: 20px;
        }

        &-population::before {
            background-position: 16px 16px;
        }

        &-family::before {
            background-position: 15px -29px;
        }

        &-female::before {
            background-position: 15px -77px;
        }

        &-male::before {
            background-position: 14px -171px;
        }

        &-third-gender::before {
            background-position: 12px -173px;
        }
    }
</style>