@extends('layouts.app', ['strikethrough' => "strikethrough-white"])
@section('content')
  <script>
    window.addEventListener(
      "load",
      (event) => {
        let ticking = false;
        let prevRatios = {};
        let bgColorClasses = [];
        let lastKnownScrollPosition = 0;

        function handleIntersect(entries, observer) {
          entries.forEach((entry, key) => {
            prevRatios[entry.target.dataset.bg] = 0;

            if (entry.intersectionRatio > 0) {
              activeSections.push(entry.target);
              activeSections = [...new Set(activeSections)];
            }

            if (entry.intersectionRatio == 0) {
              let sectionArrayPosition = activeSections.indexOf(
                entry.target
              );
              if (sectionArrayPosition > -1) {
                activeSections.splice(sectionArrayPosition, 1);
              }
            }

            if (
              entry.intersectionRatio > 0.3 &&
              entry.intersectionRatio >
              prevRatios[entry.target.dataset.bg]
            ) {
              document.body.classList.remove(...bgColorClasses);
              document.body.classList.add(entry.target.dataset.bg);
            }

            prevRatios[entry.target.dataset.bg] =
              entry.intersectionRatio;
          });
        }
        let observer = new IntersectionObserver(handleIntersect, {
          root: null,
          rootMargin: "0px",
          threshold: [0, 0.3],
        });

        let sections = document.querySelectorAll("[data-bg]");
        let activeSections = [sections[0]]; // first section

        sections.forEach((section) => {
          bgColorClasses.push(section.dataset.bg);
          observer.observe(section);
        });

        window.addEventListener("scroll", function(e) {
          let lastKnownScrollPosition = window.scrollY;
          if (!ticking) {
            window.requestAnimationFrame(function() {
              activeSections.forEach((section) => {
                let swing =
                  ((section.offsetTop - lastKnownScrollPosition) /
                    section.clientHeight) *
                  100 *
                  (Array.prototype.indexOf.call(
                      sections,
                      section
                    ) %
                    2 ==
                    0 ?
                    -1 :
                    1);

                let scrollContainer =
                  section.querySelector(".grid");
                if (scrollContainer) {
                  scrollContainer.style.transform = `translateX(${swing}px)`;
                }
              });
              ticking = false;
            });

            ticking = true;
          }
        });
      },
      false
    );
  </script>

  <div class="preserve-3d flex flex-row" data-bg="bg-axis-yellow">
    <div class="flex h-screen flex-col items-start justify-center gap-12 p-6 lg:w-2/5 lg:p-12 lg:pr-24">
      <h1 class="text-4xl font-bold uppercase italic lg:text-6xl 2xl:text-8xl">
        We support artists & elevate artists??? voices
      </h1>
    </div>
    <div class="hidden flex-1 items-center bg-white lg:flex lg:w-3/5">
      <div class="no-scrollbar perspective relative w-full overflow-y-hidden overflow-x-scroll py-16 2xl:py-32">
        <div
          class="preserve-3d relative grid h-[80vh] w-[213vh] grid-cols-[repeat(16,_minmax(0,_1fr))] grid-rows-6 2xl:h-[60vh] 2xl:w-[160vh]">
          <a class="col-span-2 col-start-1 row-span-3 row-start-1 block w-full transition duration-500 ease-out hover:scale-105"
            href="#"><img src="@asset('images/sample-images/image-27.jpg')" alt="" />
          </a>
          <a class="layer-3 col-span-2 col-start-5 row-span-3 row-start-2 block w-full transform transition duration-500 ease-out hover:scale-105"
            href="#">
            <img src="@asset('images/sample-images/image-5.jpg')" alt="" /></a>
          <a class="layer-2 col-span-2 col-start-7 row-span-3 row-start-1 block w-full transform transition duration-500 ease-out hover:scale-105"
            href="#">
            <img src="@asset('images/sample-images/image-8.jpg')" alt="" /></a>
          <a class="col-span-3 col-start-9 row-span-3 row-start-3 w-full transform transition duration-500 ease-out hover:scale-105"
            href="#">
            <img src="@asset('images/sample-images/image-25.jpg')" alt="" />
          </a>
          <a class="layer-2 col-span-3 col-start-2 row-span-2 row-start-4 w-full transform transition duration-500 ease-out hover:scale-105"
            href="#">
            <img src="@asset('images/sample-images/image-29.jpg')" alt="" /></a>

          <a class="layer-2 col-span-3 col-start-12 row-span-2 row-start-2 w-full transform transition duration-500 ease-out hover:scale-105"
            href="#">
            <img src="@asset('images/sample-images/image-2.jpg')" alt="" /></a>
        </div>
      </div>
    </div>
  </div>

  <div class="section-two preserve-3d flex flex-row" data-bg="bg-axis-purple">
    <div class="flex h-screen flex-col items-start justify-center gap-12 p-6 lg:w-2/5 lg:p-12 lg:pr-24">
      <h1 class="text-4xl font-bold uppercase italic lg:text-6xl 2xl:text-8xl">
        We deliver projects that connect &amp; support artists
      </h1>
      <a class="border-2 border-black px-6 py-2 font-mono font-bold lowercase 2xl:text-lg" href="#">See all of our
        projects</a>
    </div>
    <div class="hidden flex-1 items-center bg-white lg:flex lg:w-3/5">
      <div class="no-scrollbar perspective relative w-full overflow-y-hidden overflow-x-scroll py-16 2xl:py-32">
        <div
          class="preserve-3d relative grid h-[80vh] w-[213vh] grid-cols-[repeat(16,_minmax(0,_1fr))] grid-rows-6 2xl:h-[60vh] 2xl:w-[160vh]">
          <div
            class="col-span-6 col-start-1 row-span-3 row-start-1 flex transform flex-row items-center gap-8 transition duration-500 ease-out hover:scale-105">
            <img class="h-auto w-1/2" src="@asset('images/sample-images/image-18.jpg')" alt="" />
            <div class="w-1/2">
              <h3 class="mb-6 text-3xl font-bold">Summer school</h3>
              <p>
                Lorem ipsum, dolor sit amet consec tetur adipisi
                cing elit. Volupt atibus tempora eligendi praes
                entium.
              </p>
              <a class="mt-4 -ml-16 inline-block rounded-r-full bg-axis-yellow px-16 py-4" href="#">Read more</a>
            </div>
          </div>

          <div
            class="layer-3-no-scale col-span-6 col-start-3 row-span-3 row-start-4 flex transform flex-row items-center gap-8 transition duration-500 ease-out hover:scale-105">
            <img class="h-auto w-1/2" src="@asset('images/sample-images/image-31.jpg')" alt="" />
            <div class="w-1/2">
              <h3 class="mb-6 text-3xl font-bold">Praxis</h3>
              <p>
                Lorem ipsum, dolor sit amet cons ectetur adipi
                sicing elit. Volupta tibus tempora eligendi prae
                sentium.
              </p>
              <a class="mt-4 -ml-16 inline-block rounded-r-full bg-axis-yellow px-16 py-4" href="#">Read more</a>
            </div>
          </div>

          <div
            class="col-span-6 col-start-8 row-span-3 row-start-2 flex transform flex-row items-center gap-8 transition duration-500 ease-out hover:scale-105">
            <img class="h-auto w-1/2" src="@asset('images/sample-images/image-10.jpg')" alt="" />
            <div class="w-1/2">
              <h3 class="mb-6 text-3xl font-bold">Vacant Space</h3>
              <p>
                Lorem ipsum, dolor sit amet cons ectetur adipi
                sicing elit. Volupta tibus tempora eligendi prae
                sentium.
              </p>
              <a class="mt-4 -ml-16 inline-block rounded-r-full bg-axis-yellow px-16 py-4" href="#">Read more</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-two preserve-3d flex flex-row" data-bg="bg-axis-cream">
    <div class="flex h-screen flex-col items-start justify-center gap-8 p-6 lg:w-2/5 lg:p-12 lg:pr-24">
      <h1 class="text-4xl font-bold uppercase italic lg:text-6xl 2xl:text-8xl">
        We provide space where artists connect
      </h1>
      <a class="border-2 border-black px-6 py-2 font-mono font-bold lowercase 2xl:text-lg" href="#">Become a member</a>
    </div>
    <div class="hidden flex-1 items-center bg-white lg:flex lg:w-3/5">
      <div class="no-scrollbar perspective relative w-full overflow-y-hidden overflow-x-scroll py-16 2xl:py-32">
        <div
          class="preserve-3d relative grid h-[80vh] w-[213vh] grid-cols-[repeat(16,_minmax(0,_1fr))] grid-rows-6 2xl:h-[60vh] 2xl:w-[160vh]">
          <a href="#"
            class="layer-2 col-span-4 col-start-1 row-start-2 block transform transition duration-500 ease-out hover:scale-105">
            <img src="@asset('images/sample-images/image-16.jpg')" alt="" />
          </a>
          <a href="#"
            class="layer-3 col-span-2 col-start-8 row-start-1 block transform transition duration-500 ease-out hover:scale-105">
            <img src="@asset('images/sample-images/image-7.jpg')" alt="" />
          </a>
          <a href="#"
            class="layer-2 col-span-3 col-start-9 row-start-4 transform transition duration-500 ease-out hover:scale-105">
            <img src="@asset('images/sample-images/image-6.jpg')" alt="" /></a>
          <a href="#"
            class="layer-2 col-span-3 col-start-4 row-start-5 transform transition duration-500 ease-out hover:scale-105">
            <img src="@asset('images/sample-images/image-9.jpg')" alt="" />
          </a>
          <a href="#"
            class="col-span-2 col-start-6 row-start-2 transform transition duration-500 ease-out hover:scale-105">
            <img src="@asset('images/sample-images/image-28.jpg')" alt="" /></a>
        </div>
      </div>
    </div>
  </div>

  <div class="section-two preserve-3d flex flex-row" data-bg="bg-axis-blue">
    <div class="flex h-screen flex-col items-start justify-center gap-8 p-6 lg:w-2/5 lg:p-12 lg:pr-24">
      <h1 class="text-4xl font-bold uppercase italic lg:text-6xl 2xl:text-8xl">
        We bring you the latest news &amp; opinion in art.
      </h1>
      <a class="border-2 border-black px-6 py-2 font-mono font-bold lowercase 2xl:text-lg" href="#">Read articles</a>
    </div>
    <div class="hidden flex-1 items-center bg-white lg:flex lg:w-3/5">
      <div class="no-scrollbar perspective relative w-full overflow-y-hidden overflow-x-scroll py-16 2xl:py-32">
        <div
          class="preserve-3d relative grid h-[80vh] w-[213vh] grid-cols-[repeat(16,_minmax(0,_1fr))] grid-rows-6 2xl:h-[60vh] 2xl:w-[160vh]">
          <div
            class="col-span-3 col-start-2 row-span-3 row-start-2 transform transition duration-500 ease-out hover:scale-105">
            <img class="h-auto" src="@asset('images/sample-images/image-14.jpg')" alt="" />
            <div class="-mt-16">
              <a class="mb-8 -ml-16 inline-block rounded-r-full bg-axis-yellow px-16 py-4" href="#">Read more</a>
              <h3 class="mb-3 text-3xl font-bold">Article title</h3>
              <p>
                Lorem ipsum, dolor sit amet consec tetur adipisi
                cing elit. Volupt atibus tempora eligendi praes
                entium.
              </p>
            </div>
          </div>

          <div
            class="layer-3-no-scale col-span-3 col-start-6 row-span-3 row-start-3 transform transition duration-500 ease-out hover:scale-105">
            <img class="h-auto" src="@asset('images/sample-images/image-1.jpg')" alt="" />
            <div class="-mt-16">
              <a class="mb-8 -ml-16 inline-block rounded-r-full bg-axis-yellow px-16 py-4" href="#">Read more</a>
              <h3 class="mb-6 text-3xl font-bold">Article title</h3>
              <p>
                Lorem ipsum, dolor sit amet cons ectetur adipi
                sicing elit. Volupta tibus tempora eligendi prae
                sentium.
              </p>
            </div>
          </div>

          <div
            class="col-span-3 col-start-10 row-span-3 row-start-1 transform transition duration-500 ease-out hover:scale-105">
            <img class="h-auto" src="@asset('images/sample-images/image-15.jpg')" alt="" />
            <div class="-mt-16">
              <a class="mb-8 -ml-16 inline-block rounded-r-full bg-axis-yellow px-16 py-4" href="#">Read more</a>
              <h3 class="mb-6 text-3xl font-bold">Article title</h3>
              <p>
                Lorem ipsum, dolor sit amet cons ectetur adipi
                sicing elit. Volupta tibus tempora eligendi prae
                sentium.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
