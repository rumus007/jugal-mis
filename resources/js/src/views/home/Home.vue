<template>
  <main>
    <section class="hero-section">
      <div class="container">
        <div class="hero-section__container">
          <div>
            <h1 class="hero-section__title">जुगल गाउँपालिका</h1>
            <p class="hero-section__desc">
              यस प्राेफाईलमार्फत् जुगल गाउँपालिकाकाे बस्तुस्थिति विवरण प्राप्त गर्न सकिन्छ। यसमा मूख्यत् जुगल गाउँपालिकाकाे घरधुरीकाे विवरण, पारिवारिक विवरण, जनसांखिकीय विवरण एवं संस्थागत विवरण समावेश गरिएकाे छ। विवरणलाई उपयुक्त चार्ट, तालिका एवं नक्सामा देखाइएकाे छ। प्रयाेगकर्ताले आवश्यकताअनुसार डाउनलाेड समेत गरी प्रयाेग गर्न सकिन्छ।
            </p>
          </div>

          <!-- <button class="hero-section__btn" @click="scroll('about')">
            थप जानकारी
            <i class="ri-arrow-down-line"></i>
          </button>-->

          <div class="hero-section__cards info-cards-section">
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
                <div class="card__title">{{ homePageData.employed_percentage }}%</div>
                <div class="card__desc">राेजगार जनसंख्या</div>
              </div>
              <div class="card">
                <div class="card__title">{{ homePageData.internet_percentage }}%</div>
                <div class="card__desc">इन्टरनेटकाे पहुँच</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about-section" id="about">
      <div class="container">
        <div class="about-section__container">
          <div class="about-section__map about-map">
            <img :src="mapImage" alt="Map Image" />
            <div class="about-map__overlay">
              <router-link class="about-map__btn" to="/institution">जुगल गाउँपालिका संस्थागत विवरण</router-link>
            </div>
          </div>
          <div class="about-section__desc">
            <h2 class="about-section__title">जुगल गाउँपालिकाः संक्षिप्त परिचय</h2>
            <div class="about-section__content">
              <p>जुगल गाउँपालिका बागमती प्रदेश अन्तरगत सिन्धुपाल्चोक जिल्लामा पर्दछ । यो गाँउपालिकाकाे कुल क्षेत्रफल ५९६ वर्ग कि.मी. छ । यो गाँउपालिकामा ७ वडा (साबिक सेलाङ, गाेल्चे, गुम्बा, पाङताङ, बराम्ची, हगाम गाबिस) छन ।  २०६८ को जनगणना अनुसार यो गाउँपालिकाको जम्मा जनसंख्या १९२२३ रहेको छ । यहाँका बासिन्दाहरुको मुख्य विशेषता भनेको धार्मिक र सास्कृतिक विविधतामा एकता हो । यहा विभिन्न धर्मका अनुयायीहरु जस्तै हिन्दु , बौद्ध र क्रिचियनहरुको बसोबास रहेको छ। जसले सार्वलौकिक सस्कृती झल्काउछ । यहाको मुख्य भाषा भनेको तामाङ, नेपाली, शेर्पा, नेवारी हो । यस क्षेत्रकाे मुख्य आयस्राेतहरू कृषि, पशुपालन, जडिबुटी ब्यबसाय आदि हुन । जल स्राेतकाे धनी रहेकाे याे गाँउपालिकामा साना र ठुलाे गरी करिब १० वटा जलबिध्युत आयोजना छन्।</p>
            </div>
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
    <Footer></Footer>
  </main>
</template>

<script>
import mapImage from "../../../../../public/images/map.jpg";
import { englishToNepaliNumber } from "nepali-number";
export default {
  name: "Home",
  components: {
    Loader: () => import("../components/Loader/Loader"),
    Footer: () => import("../shared/Footer"),
  },
  data() {
    return {
      homePageData: {},
      showLoader: false,
      mapImage: mapImage,
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
  position: relative;

  &__container {
    display: flex;
    justify-content: space-between;
  }

  &__map {
    width: calc(50% - 12px);
    margin-right: 12px;

    img {
      display: block;
      height: 100%;
      width: 100%;
    }
  }

  &__desc {
    background-color: var(--color-base);
    width: calc(50% - 12px);
    margin-left: 12px;
    padding: 48px 40px;
    box-shadow: 0px 8px 40px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  &__title {
    color: var(--color-primary-dark);
    font-size: 40px;
    font-weight: bold;
    line-height: 52px;
    margin-bottom: 20px;
  }

  &__content {
    display: flex;
    flex-direction: column;
    min-height: calc(100% - 52px);
    justify-content: space-between;
    p {
      font-size: 20px;
      line-height: 32px;
      margin-bottom: 0;
    }
  }

  &__note {
    background-color: var(--blue-100);
    padding: 17px 22px;
    color: var(--neutrals-700);
  }
}

.about-map {
  position: relative;

  /* &:hover {
    .about-map__overlay {
      opacity: 1;
    }
  } */

  &__overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    width: 100%;
    /* opacity: 0; */
    transition: 0.5s ease;
    background-color: rgba(0, 83, 155, 0.3);
  }

  &__btn {
    background-color: var(--blue-400);
    padding: 16px 33px;
    font-size: 18px;
    color: var(--neutrals-0);
    border-radius: 50px;
    transition: transform 0.3s ease-in-out;
    text-align: center;
    &:hover {
      transform: scale(1.1);
    }
  }
}

.card {
  padding: 25px;

  &__img {
    align-items: center;
    background-color: var(--blue-200);
    border-radius: 50%;
    color: var(--blue-400);
    display: flex;
    font-size: 22px;
    height: 48px;
    justify-content: center;
    margin-bottom: 28px;
    width: 48px;
  }

  &__title {
    color: var(--color-primary-dark);
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 12px;
  }

  &__desc {
    font-size: 18px;
    line-height: 27px;
    margin-bottom: 18px;
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

  .card {
    padding: 25px;
  }

  &__container {
    display: grid;
    gap: 23px;
    grid-template-columns: repeat(4, 1fr);
  }
}

.hero-section {
  position: relative;
  margin-bottom: 80px;

  &::after {
    background: linear-gradient(rgba(2, 142, 255, 0.4), rgba(2, 142, 255, 0.4)),
      url("../../../../../public/images/hero-img.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center 0;
    content: "";
    height: 100%;
    position: absolute;
    right: 0;
    top: 0;
    width: 100%;
    z-index: -1;
  }

  &__container {
    align-items: center;
    justify-content: space-between;
    display: flex;
    flex-direction: column;
    min-height: 620px;
    text-align: center;
    padding-top: 100px;
    padding-bottom: 60px;
  }

  &__title {
    color: var(--color-base);
    font-size: 80px;
    margin-bottom: 6px;
  }

  &__desc {
    color: var(--color-base);
    font-size: 20px;
    font-weight: 700;
    line-height: 32px;
    margin: 0 auto 64px;
    max-width: 800px;
  }

  &__cards {
    width: 100%;
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
  position: relative;

  .spinner-local {
    min-height: 150px;
  }

  .double-bounce1,
  .double-bounce2 {
    background-color: white;
  }

  &__container {
    display: grid;
    gap: 40px;
    grid-template-columns: repeat(5, minmax(0, 1fr));
  }

  .card {
    background-color: #fff;
    height: 150px;
    padding: 20px;
    text-align: center;

    &__title {
      font-size: 40px;
      font-weight: 700;
      color: var(--blue-400);
      margin-bottom: 0;
    }

    &__desc {
      font-size: 18px;
      line-height: 23px;
      margin-bottom: 0px;
    }
  }
}
</style>

