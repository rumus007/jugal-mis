<template>
  <main>
    <section class="hero-section">
      <div class="container">
        <div class="hero-section__container">
          <h1 class="hero-section__title">जुगल गाउँपालिका</h1>
          <h2 class="hero-section__desc">
            जुगल गाउँपालिका बागमती प्रदेश अन्तरगत सिन्धुपाल्चोक जिल्लामा पर्दछ ।
            यो गाँउपालिकाकाे कुल क्षेत्रफल ५९२ वर्ग कि.मी. छ ।
          </h2>
          <button class="hero-section__btn" @click="scroll('about')">
            थप जानकारी
            <i class="ri-arrow-down-line"></i>
          </button>
        </div>
      </div>
    </section>

    <section class="about-section" id="about">
      <div class="container">
        <div class="about-section__container">
          <h2 class="about-section__title">जुगल गाउँपालिका</h2>
          <div class="about-section__desc">
            <p>
              बागमती प्रदेशको पहाडी जिल्ला सिन्धुपाल्चोकमा अवस्थित जुगल
              गाउँपालिका सिन्धुपाल्चोक जिल्लाको उत्तरपुर्वी क्षेत्रमा अवस्थित छ
              । नेपालको संविधान २०७२ ले परिकल्पना गरे अनुसार संघीय शासकीय स्वरुप
              वमोजिम राज्य पुर्नसंरचनामा सविकका सेलाङ, गोल्चे, गुम्बा, पाङताङ,
              बराम्ची र हगाम गरी ६ वटा गा.वि.स.हरु समावेश गरि यस गाउँपालिकाको
              गठन गरिएको हो । हाल यस गाउँपालिकामा सेलाङ, गोल्चे, गुम्बा, पाङताङ,
              बराम्ची हगाम र याङलाकोट गरि ७ वटा वडाहरु रहेका छन् ।
            </p>
            <p>
              यस गाउँपालिका ५९२ वर्गकिलोमिटर क्षेत्रमा फैलिएको छ । ब्रहयणी नदीको
              तटीय क्षेत्र तथा तल्लो किनारा ढाँडेको ८१० मिटर देखि दोर्जे लाक्पा
              हिमालको शिर ६९६६ मिटर उचाइसम्म फैलिएको छ । २०६८ सालको जनगणना
              अनुसार १९२३१ जनसंख्या रहेको छ । तामाङ समुदायको बाहुल्यता रहेको यस
              क्षेत्रमा बाहुन, क्षेत्री, नेवार, शेर्पा, लगाएतका समुदायको बसोबास
              रहेको छ ।
            </p>
            <p>
              जुगल हिमश्रृंखलामा २६ वटा पीक छन् । यस हिमश्रृंखलामा रहेका हिमाल
              मध्ये दोर्जे र लाक्पा २ वटा हिमालका युगल जोडी मानिन्छ । युगल हिमाल
              भन्ने बोलीचालीको भाषा नै पछि गएर जुगल कायम हुन गएको र सोहीबाट यस
              गाउँपालिकाको नामाकरण गरिएको हो । जुगल हिमाल संघीय राजधानी
              काठमाडौंबाट सबै भन्दा नजिक रहेको हिमाल हो । जुगल हिमश्रृंखला, जुगल
              हिमाल, नेपेमासाल, नमस्तेपास, ब्रहयणी नदी जस्ता प्रमुख धार्मिक तथा
              पर्यटकीय क्षेत्र रहेका छन् । गाउँपालिकामा ढाँडे बजार, कात्तिके
              बजार, जस्ता प्रमुख व्यापारिक केन्द्रहरु छन् ।
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="category-cards-section">
      <div class="container">
        <div class="category-cards-section__container">
          <div class="card">
            <div class="card__img">
              <i class="ri-home-4-fill"></i>
            </div>
            <h2 class="card__title">घरधुरीकाे विवरण</h2>
            <div class="card__desc">
              यस खण्डअन्तर्गत वागमती गाउँपालिकामा रहेका घरधुरीकाे भाैतिक
              अवस्थाका साथसाथै अन्य अवस्था जस्तैः उपभाेग्य बस्तु, शाैचालयकाे
              अवस्था आदिका बारेमा जानकारी लिन सकिन्छ।
            </div>
            <div class="card__action">
              <a href="/house">
                थप जानकारी
                <i class="ri-arrow-right-line"></i>
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card__img">
              <i class="ri-team-fill"></i>
            </div>
            <h2 class="card__title">पारिवारिक विवरण</h2>
            <div class="card__desc">
              यस खण्डअन्तर्गत वागमती गाउँपालिकामा रहेका घरधुरीकाे भाैतिक
              अवस्थाका साथसाथै अन्य अवस्था जस्तैः उपभाेग्य बस्तु, शाैचालयकाे
              अवस्था आदिका बारेमा जानकारी लिन सकिन्छ।
            </div>
            <div class="card__action">
              <a href="#">
                थप जानकारी
                <i class="ri-arrow-right-line"></i>
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card__img">
              <i class="ri-parent-fill"></i>
            </div>
            <h2 class="card__title">जनसांख्यिकीय विवरण</h2>
            <div class="card__desc">
              यस खण्डअन्तर्गत वागमती गाउँपालिकामा रहेका घरधुरीकाे भाैतिक
              अवस्थाका साथसाथै अन्य अवस्था जस्तैः उपभाेग्य बस्तु, शाैचालयकाे
              अवस्था आदिका बारेमा जानकारी लिन सकिन्छ।
            </div>
            <div class="card__action">
              <a href="#">
                थप जानकारी
                <i class="ri-arrow-right-line"></i>
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card__img">
              <i class="ri-hotel-fill"></i>
            </div>
            <h2 class="card__title">संस्थागत विवरण</h2>
            <div class="card__desc">
              यस खण्डअन्तर्गत वागमती गाउँपालिकामा रहेका घरधुरीकाे भाैतिक
              अवस्थाका साथसाथै अन्य अवस्था जस्तैः उपभाेग्य बस्तु, शाैचालयकाे
              अवस्था आदिका बारेमा जानकारी लिन सकिन्छ।
            </div>
            <div class="card__action">
              <a href="/institution">
                थप जानकारी
                <i class="ri-arrow-right-line"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="info-cards-section">
      <div class="container">
        <div v-if="showLoader" class="loader-wrapper">
          <loader />
        </div>
        <div class="info-cards-section__container" v-else>
          <div class="card">
            <div class="card__title">{{ homePageData.household_count }}</div>
            <div class="card__desc">घरपरिवारकाे कूल संख्या</div>
          </div>
          <div class="card">
            <div class="card__title">{{ homePageData.population_count }}</div>
            <div class="card__desc">कूल जनसंख्या</div>
          </div>
          <div class="card">
            <div class="card__title">{{ homePageData.youth_percentage }}%</div>
            <div class="card__desc">युवाकाे प्रतिशत</div>
          </div>
          <div class="card">
            <div class="card__title">
              {{ homePageData.employed_percentage }}%
            </div>
            <div class="card__desc">राेजगार जनसंख्या</div>
          </div>
          <div class="card">
            <div class="card__title">
              {{ homePageData.internet_percentage }}%
            </div>
            <div class="card__desc">इन्टरनेटकाे पहुँच</div>
          </div>
          <div class="card">
            <div class="card__title">१००</div>
            <div class="card__desc">अन्य</div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import { englishToNepaliNumber } from "nepali-number";
export default {
  name: "Home",
  components: {
    Loader: () => import("../components/Loader/Loader"),
  },
  data() {
    return {
      homePageData: {},
      showLoader: false,
    };
  },
  methods: {
    scroll(id) {
      document.getElementById(id).scrollIntoView({
        behavior: "smooth",
      });
    },
    getHomeStats: function () {
      this.showLoader = true;
      const targetUrl = `home/summary-stats`;
      axios
        .get(targetUrl, { params: {} })
        .then(({ data }) => {
          let testData = {
            family_count: 20,
            total_population: 200,
            youth_percentage: 30,
            job_count: 30,
            internet_access: 8,
            others: 100,
          };
          // this.homePageData = data.data;
          let formattedData = {};
          for (let [key, value] of Object.entries(data.data)) {
            formattedData[key] = this.getFormattedCount(value);
          }
          this.homePageData = formattedData;
          this.showLoader = false;
        })
        .catch(() => {
          this.showLoader = false;
        });
    },
    getFormattedCount(count) {
      return englishToNepaliNumber(count);
    },
  },
  mounted() {
    this.getHomeStats();
  },
};
</script>

<style lang="scss" scoped>
.about-section {
  margin-bottom: 80px;
  margin-top: -100px;
  padding-top: 30px;
  position: relative;

  &::after {
    bottom: 21px;
    box-shadow: 0px 2px 60px #014983;
    content: "";
    height: 375px;
    left: 50%;
    position: absolute;
    transform: translateX(-50%);
    width: 702px;
    z-index: -2;
  }

  &__container {
    background-color: var(--color-base);
    padding: 77px 129px;
  }

  &__title {
    color: var(--color-primary-dark);
    font-size: 40px;
    font-weight: bold;
    line-height: 54px;
    margin-bottom: 32px;
  }

  &__desc {
    font-size: 18px;
    line-height: 27px;

    p {
      margin-bottom: 24px;
    }
  }
}

.card {
  padding: 64px 56px;

  &__img {
    align-items: center;
    background-color: var(--blue-200);
    border-radius: 50%;
    color: var(--blue-400);
    display: flex;
    font-size: 34px;
    height: 80px;
    justify-content: center;
    margin-bottom: 33px;
    width: 80px;
  }

  &__title {
    color: var(--color-primary-dark);
    font-size: 32px;
    font-weight: 500;
    margin-bottom: 18px;
  }

  &__desc {
    font-size: 18px;
    line-height: 27px;
    margin-bottom: 29px;
  }

  &__action {
    a {
      color: #333456;
      display: flex;
      i {
        margin-left: 8px;
      }
    }
  }

  &:hover {
    box-shadow: 8px 8px 40px rgba(1, 73, 131, 0.1);
    .card__action a {
      color: var(--color-link);
    }
  }
}

.category-cards-section {
  margin-bottom: 80px;
  &__container {
    display: grid;
    gap: 40px;
    grid-template-columns: 1fr 1fr;
  }
}

.hero-section {
  position: relative;

  &::before {
    background-color: #014983;
    content: "";
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 50%;
    z-index: -1;
  }

  &::after {
    background: linear-gradient(rgba(2, 142, 255, 0.3), rgba(2, 142, 255, 0.3)),
      url("../../../../../public/images/hero-img.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 50%;
    content: "";
    height: 100%;
    position: absolute;
    right: 0;
    top: 0;
    width: 50%;
    z-index: -1;
  }

  &__container {
    align-items: center;
    display: flex;
    flex-direction: column;
    height: calc(100vh - 118px);
    justify-content: center;
    text-align: center;
  }

  &__title {
    color: var(--color-base);
    font-size: 80px;
    margin-bottom: 16px;
  }

  &__desc {
    color: var(--color-base);
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 40px;
  }

  &__btn {
    align-items: center;
    background-color: var(--color-btn);
    border-radius: 50px;
    cursor: pointer;
    color: #fff;
    display: flex;
    font-size: 18px;
    height: 56px;
    justify-content: center;
    transition: transform 0.3s ease-in-out;
    width: 292px;
    &:hover {
      background-color: var(--orange-500);
      transform: scale(1.1);
    }
    i {
      margin-left: 8px;
    }
  }
}
.info-cards-section {
  background-color: var(--blue-400);
  padding: 64px 0;
  position: relative;

  .double-bounce1,
  .double-bounce2 {
    background-color: white;
  }

  &__container {
    display: grid;
    gap: 40px;
    grid-template-columns: 1fr 1fr 1fr;
  }

  .card {
    background-color: #fff;
    padding: 56px;
    text-align: center;

    &__title {
      font-size: 40px;
      font-weight: 700;
      margin-bottom: 0;
    }

    &__desc {
      font-size: 24px;
      line-height: 31px;
      margin-bottom: 0px;
    }
  }
}
</style>

