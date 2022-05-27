<x-layouts.app previewify="757" :previewify-data="[
    'title' => 'The elegant TALLkit for Laravel artisans.',
    'subtitle' => 'Rapidly build TALL stack apps, designed for humans.',
    'code' => 'composer require filament/filament',
]">
    <header class="relative overflow-hidden max-w-8xl mx-auto py-20 md:pb-48 px-8">
        <div class="space-y-12 max-w-screen-sm">
            <div class="space-y-4">
                <h1 class="font-heading font-bold text-gray-900 text-4xl leading-tight md:text-5xl md:leading-tight lg:text-6xl lg:leading-tight">
                    The elegant <span class="text-primary-500">TALL</span>kit for Laravel artisans.
                </h1>

                <h3 class="text-gray-700 text-2xl">
                    Filament is a collection of tools for rapidly building beautiful TALL stack apps, designed for humans.
                </h3>
            </div>

            <div class="flex flex-wrap gap-4">
                <x-button
                    tag="a"
                    href="https://demo.filamentphp.com"
                    target="_blank"
                    size="lg"
                >
                    Admin panel demo
                </x-button>

                <a
                    href="{{ route('discord') }}"
                    target="_blank"
                    class="inline-flex items-center font-medium space-x-4 text-lg px-4 py-2 rounded-lg bg-gray-900 text-white transition hover:text-primary-100 hover:scale-105 hover:-rotate-1"
                >
                    <svg class="w-5" fill="none" viewBox="0 0 71 55" aria-hidden="true">
                        <g clip-path="url(#clip0)">
                            <path d="M60.1045 4.8978C55.5792 2.8214 50.7265 1.2916 45.6527 0.41542C45.5603 0.39851 45.468 0.440769 45.4204 0.525289C44.7963 1.6353 44.105 3.0834 43.6209 4.2216C38.1637 3.4046 32.7345 3.4046 27.3892 4.2216C26.905 3.0581 26.1886 1.6353 25.5617 0.525289C25.5141 0.443589 25.4218 0.40133 25.3294 0.41542C20.2584 1.2888 15.4057 2.8186 10.8776 4.8978C10.8384 4.9147 10.8048 4.9429 10.7825 4.9795C1.57795 18.7309 -0.943561 32.1443 0.293408 45.3914C0.299005 45.4562 0.335386 45.5182 0.385761 45.5576C6.45866 50.0174 12.3413 52.7249 18.1147 54.5195C18.2071 54.5477 18.305 54.5139 18.3638 54.4378C19.7295 52.5728 20.9469 50.6063 21.9907 48.5383C22.0523 48.4172 21.9935 48.2735 21.8676 48.2256C19.9366 47.4931 18.0979 46.6 16.3292 45.5858C16.1893 45.5041 16.1781 45.304 16.3068 45.2082C16.679 44.9293 17.0513 44.6391 17.4067 44.3461C17.471 44.2926 17.5606 44.2813 17.6362 44.3151C29.2558 49.6202 41.8354 49.6202 53.3179 44.3151C53.3935 44.2785 53.4831 44.2898 53.5502 44.3433C53.9057 44.6363 54.2779 44.9293 54.6529 45.2082C54.7816 45.304 54.7732 45.5041 54.6333 45.5858C52.8646 46.6197 51.0259 47.4931 49.0921 48.2228C48.9662 48.2707 48.9102 48.4172 48.9718 48.5383C50.038 50.6034 51.2554 52.5699 52.5959 54.435C52.6519 54.5139 52.7526 54.5477 52.845 54.5195C58.6464 52.7249 64.529 50.0174 70.6019 45.5576C70.6551 45.5182 70.6887 45.459 70.6943 45.3942C72.1747 30.0791 68.2147 16.7757 60.1968 4.9823C60.1772 4.9429 60.1437 4.9147 60.1045 4.8978ZM23.7259 37.3253C20.2276 37.3253 17.3451 34.1136 17.3451 30.1693C17.3451 26.225 20.1717 23.0133 23.7259 23.0133C27.308 23.0133 30.1626 26.2532 30.1066 30.1693C30.1066 34.1136 27.28 37.3253 23.7259 37.3253ZM47.3178 37.3253C43.8196 37.3253 40.9371 34.1136 40.9371 30.1693C40.9371 26.225 43.7636 23.0133 47.3178 23.0133C50.9 23.0133 53.7545 26.2532 53.6986 30.1693C53.6986 34.1136 50.9 37.3253 47.3178 37.3253Z" fill="currentColor"/>
                        </g>
                    </svg>

                    <span>
                        Join our Discord community
                    </span>
                </a>
            </div>
        </div>

        <div class="hidden absolute right-0 bottom-0 -mb-3 md:block">
            <img
                src="{{ asset('images/dog.svg') }}"
                alt="Dog"
                class="h-[20rem] lg:h-[28rem]"
            />
        </div>
    </header>

    <div class="bg-gray-900">
        <div class="max-w-7xl mx-auto grid grid-cols-2 gap-8 py-12 px-4 sm:px-6 lg:px-8 lg:grid-cols-5">
            <p class="col-span-2 text-center text-base font-semibold uppercase text-gray-400 tracking-wider lg:col-span-1">
                Premium Sponsors
            </p>

            <a
                class="col-span-1 flex items-center justify-center text-gray-400 hover:text-gray-200 mr-12 lg:col-span-1"
                href="https://ploi.io"
                target="_blank"
                title="Ploi"
            >
                <svg class="w-auto h-6 fill-current" viewBox="0 0 253 93.3">
                    <path d="M25.7 66a11.4 11.4 0 01-9.5-4.7q-3.6-4.7-3.7-12.6T16.2 36a11.4 11.4 0 019.5-4.7 11.4 11.4 0 019.6 4.7Q39 40.7 39 48.7t-3.6 12.6a11.5 11.5 0 01-9.6 4.7zm3.8-45.1a18.9 18.9 0 00-10.2 2.7 18 18 0 00-6.7 7.5h-.3v-9.3H0v71.5h12.6V66.5h.3a17 17 0 006.6 7.2 19.4 19.4 0 0010.2 2.6q10.2 0 16.1-7.4t6-20.3q0-12.9-6-20.4T29.5 21zM59.2 75.5h12.6V2.5H59.2v73.1zM105.3 66.6a11.5 11.5 0 01-9.6-4.7Q92 57.2 92 48.7t3.6-13.3a12.1 12.1 0 0119.2 0q3.6 4.7 3.6 13.3t-3.6 13.2a11.5 11.5 0 01-9.6 4.7zm0 10q11.8 0 19-7.4t7-20.6q0-13-7.1-20.4t-19-7.5q-11.7 0-18.8 7.5t-7.1 20.4q0 13.2 7 20.6t19 7.4zM145 13.7a6.7 6.7 0 004.9-2 6.6 6.6 0 002-4.8 6.6 6.6 0 00-2-4.9 6.8 6.8 0 00-5-2 6.7 6.7 0 00-4.8 2 6.5 6.5 0 00-2 4.9 6.5 6.5 0 002 4.8 6.6 6.6 0 004.8 2zm-6.3 61.9h12.6V21.8h-12.7v53.8zM168.8 76a5.7 5.7 0 10-4.1-1.6 5.6 5.6 0 004 1.7zM191.5 13.4a5.3 5.3 0 004-1.6A5.3 5.3 0 00197 8a5.5 5.5 0 10-11 0 5.3 5.3 0 001.5 4 5.3 5.3 0 004 1.5zm-4.4 62.1h8.8V22.8H187v52.8zM228.6 68.7a13.8 13.8 0 01-11.2-5q-4.3-5.2-4.3-14.5t4.3-14.4a14.9 14.9 0 0122.4 0q4.2 5 4.2 14.4t-4.2 14.4a13.8 13.8 0 01-11.2 5.1zm0 7.8q10.9 0 17.6-7.4t6.8-20q0-12.5-6.8-19.9T228.7 22q-11 0-17.7 7.3t-6.7 20q0 12.6 6.7 20t17.7 7.3z"></path>
                </svg>
            </a>

            <a
                class="col-span-1 flex items-center justify-center text-gray-400 hover:text-gray-200 mr-12 lg:col-span-1"
                href="https://flareapp.io"
                target="_blank"
                title="Flare"
            >
                <svg class="w-auto h-20 fill-current -my-2 lg:-my-12" viewBox="0 0 2599.5 1482.4">
                    <polygon points="641.4,740.9 427.6,617.5 427.6,370.6 642.7,494.5 	"/>
                    <polygon points="641.4,1235.2 427.6,1111.8 427.6,864.9 640.9,988.3 	"/>
                    <path d="M641.4,287.6l357.8,206.3l-144.2,83L497.6,370.6L641.4,287.6 M641.4,247.2L427.6,370.6L855,617.3l214.3-123.4L641.4,247.2z"/>
                    <path d="M641.4,781.9l143.7,83L640.9,948l-143.4-83L641.4,781.9 M641.4,741.5L427.6,864.9l213.3,123.4l214.3-123.4L641.4,741.5z"/>
                    <path d="M1172.8,551.7h200.9v47.6h-144.1v85.1h130.3V732h-130.3v133.2h-56.8V551.7z"/>
                    <path d="M1478.2,865.2h-55.4V551.7h55.4V865.2z"/>
                    <path d="M1524.2,799.2c0-53,43.6-66.6,89.3-71.5c41.5-4.4,58.2-5.2,58.2-21.1v-0.9c0-23.1-14.1-36.3-39.8-36.3c-27.1,0-42.7,13.8-48.2,29.9l-51.7-7.3c12.2-42.9,50.2-64.9,99.7-64.9c44.9,0,95.5,18.7,95.5,80.8v157.4h-53.3v-32.3h-1.8c-10.1,19.7-32.1,37-69,37C1558,869.9,1524.2,845.5,1524.2,799.2z M1671.7,780.8v-27.7c-7.2,5.8-36.3,9.5-50.8,11.5c-24.8,3.5-43.3,12.4-43.3,33.7c0,20.4,16.5,30.9,39.7,30.9C1650.6,829.2,1671.7,807,1671.7,780.8z"/>
                    <path d="M1782.9,630.1h53.7v39.2h2.4c8.6-27.2,31.1-42.6,58-42.6c6.1,0,14.8,0.6,19.9,1.5v51c-4.7-1.5-16.4-3.2-25.7-3.2c-30.5,0-53,21.1-53,51v138.2h-55.4V630.1z"/>
                    <path d="M1934,749c0-72.6,43.9-122,111.3-122c57.9,0,107.5,36.3,107.5,118.8v17h-163.8c0.5,40.3,24.2,63.8,60,63.8c23.9,0,42.3-10.4,49.8-30.3l51.7,5.8c-9.8,40.9-47.5,67.7-102.3,67.7C1977.3,869.8,1934,822.8,1934,749z M2099.6,725.4c-0.3-32-21.7-55.3-53.6-55.3c-33.1,0-55.3,25.3-56.9,55.3H2099.6z"/>
                </svg>
            </a>

            <a
                class="col-span-1 flex items-center justify-center text-gray-400 hover:text-gray-200 mr-12 lg:col-span-1"
                href="https://ohdear.app"
                target="_blank"
                title="Oh Dear"
            >
                <svg class="w-auto h-5 fill-current" viewBox="0 0 1749 336">
                    <path d="M1196.57759,88 C1230.7236,88 1261.93222,101.114497 1284.45224,124.914881 C1306.52547,148.258686 1318.0469,179.64605 1316.92518,213.306593 L1316.92518,213.306593 L1316.25975,233.221199 L1128.36161,233.221199 C1136.85058,265.240002 1163.75293,286.33977 1196.96734,286.33977 C1222.57685,286.33977 1244.61206,276.314466 1257.44533,258.847898 L1257.44533,258.847898 L1269.54663,242.352775 L1308.03695,271.845822 L1296.07824,288.331231 C1274.08105,318.630577 1237.80567,336 1196.57759,336 C1129.52136,336 1077,281.628266 1077,212.199146 C1077,142.556309 1129.52136,88 1196.57759,88 Z M336.891224,96 C405.322396,96 461,149.834327 461,216 C461,282.165673 405.322396,336 336.891224,336 C277.114954,336 227.074234,294.920615 215.372104,240.427361 L215.372104,240.427361 L45,240.427361 L45,191.902102 L215.29422,191.902102 C226.869787,137.248823 276.988392,96 336.891224,96 Z M534.822964,0 L534.822964,104.667369 C551.050462,94.2889591 570.825008,88.8453343 592.590539,88.8453343 C638.914781,88.8453343 693,119.951762 693,207.625805 L693,207.625805 L693,328 L643.177036,328 L643.177036,207.625805 C643.177036,179.994848 636.421216,160.207704 623.093211,148.802014 C612.597045,139.815712 600.283862,137.933966 591.798011,137.933966 C565.808884,137.933966 534.822964,150.021309 534.822964,207.625805 L534.822964,207.625805 L534.822964,328 L485,328 L485,0 L534.822964,0 Z M1053,0 L1053,326.0341 L1003.25897,326.0341 L1003.25897,304.48554 C982.847193,319.716497 958.044234,328 932.401641,328 C865.452952,328 813,275.445563 813,208.356823 C813,141.048589 865.452952,88.312831 932.401641,88.312831 C958.333762,88.312831 983.107769,96.4436427 1003.25897,111.369217 L1003.25897,111.369217 L1003.25897,0 L1053,0 Z M1460.00595,88 C1485.95737,88 1510.8858,96.1509795 1531.25897,111.124701 L1531.25897,111.124701 L1531.25897,89.978022 L1581,89.978022 L1581,326.031534 L1531.25897,326.031534 L1531.25897,304.884854 C1510.8858,319.858576 1485.95737,328 1460.00595,328 C1393.26958,328 1341,275.376971 1341,208.200669 C1341,140.804587 1393.26958,88 1460.00595,88 Z M1749,88 L1749,138.054197 L1727.77131,137.659159 C1710.66278,137.427918 1694.98651,142.987354 1684.81361,152.776587 C1676.14163,161.130194 1671.56039,172.229796 1671.56039,184.899916 L1671.56039,184.899916 L1671.56039,328 L1621,328 L1621,89.9848248 L1671.56039,89.9848248 L1671.56039,101.932314 C1688.05089,92.7886306 1707.42551,88 1728.17351,88 L1728.17351,88 L1749,88 Z M336.891224,145.099467 C296.449754,145.099467 263.56307,176.906809 263.56307,216 C263.56307,255.093191 296.449754,286.900533 336.891224,286.900533 C377.322958,286.900533 410.209642,255.093191 410.209642,216 C410.209642,176.906809 377.322958,145.099467 336.891224,145.099467 Z M933.193019,137.107245 C893.691652,137.107245 862.741033,168.399418 862.741033,208.356823 C862.741033,248.085191 893.691652,279.205586 933.193019,279.205586 C972.491716,279.205586 1003.25897,248.085191 1003.25897,208.356823 C1003.25897,168.399418 972.491716,137.107245 933.193019,137.107245 Z M1460.79733,136.858098 C1421.51793,136.858098 1390.74103,168.191113 1390.74103,208.200669 C1390.74103,247.980889 1421.51793,279.141902 1460.79733,279.141902 C1500.30835,279.141902 1531.25897,247.980889 1531.25897,208.200669 C1531.25897,168.191113 1500.30835,136.858098 1460.79733,136.858098 Z M1196.57759,137.271652 C1166.64279,137.271652 1140.81464,155.94281 1130.50049,184.357554 L1130.50049,184.357554 L1264.32777,184.357554 C1254.46041,155.94281 1227.98584,137.271652 1196.57759,137.271652 Z"></path>
                </svg>
            </a>

            <a
                class="col-span-1 flex items-center justify-center text-gray-400 hover:text-gray-200 mr-12 lg:col-span-1"
                href="https://stagent.com"
                target="_blank"
                title="Stagent"
            >
                <svg class="w-auto h-6 fill-current" viewBox="0 0 1477 282">
                    <path class="st0" d="M117,140L117,140c0,20.4-16.6,37-37,37c-20.4,0-37-16.6-37-37c0-20.4,16.6-37,37-37V60C35.9,60,0,95.9,0,140c0,44.1,35.9,80,80,80c44.1,0,80-35.9,80-80H117z"/>
                    <path class="st0" d="M203,140L203,140c0-20.4,16.6-37,37-37c20.4,0,37,16.6,37,37c0,20.4-16.6,37-37,37v43c44.1,0,80-35.9,80-80c0-44.1-35.9-80-80-80c-44.1,0-80,35.9-80,80H203z"/>
                    <path class="st1" d="M455.5,61.5c33.7,0,55.8,16.7,63.1,40.9L484,113c-3.6-16.4-13.9-22.4-28.5-22.4c-14.6,0-22.4,5.8-22.4,14.9c0,10,8.5,14.3,24.3,17.3l7.9,1.5c34,6.7,59.4,15.2,59.4,46.7s-24.9,49.4-63.1,49.4c-39.4,0-65.8-17.6-71-49.1l35.2-9.1c3.9,21.8,18.2,29.1,35.8,29.1c17.6,0,26.1-7.6,26.1-17.3s-8.5-14.3-27.3-17.9l-7.9-1.5c-31.5-6.1-56.4-17-56.4-46.7C396.1,78.1,419.7,61.5,455.5,61.5z"/>
                    <path class="st1" d="M529.9,65.7h37.6V19h38.2v46.7H647v30.9h-41.2v79.4c0,6.1,3,9.1,8.5,9.1h29.1v30.9h-42.5c-20,0-33.4-13.3-33.4-34V96.6h-37.6V65.7z"/>
                    <path class="st1" d="M735.2,61.5c39.4,0,64.3,20.3,64.3,57.9v96.7h-36.4v-17.6h-4.2c-2.7,6.7-12.7,21.8-40.6,21.8c-30.9,0-55.2-17.3-55.2-48.2c0-30.9,24.3-47,58.2-47h41.2v-8.5c0-13.9-8.5-24.9-27.9-24.9c-19.1,0-28.2,10.3-30.9,24l-35.2-11.8C675.7,81.2,696,61.5,735.2,61.5z M726.1,189.4c21.2,0,36.4-13.3,36.4-33.4v-2.4h-38.5c-14.3,0-22.7,7.3-22.7,17.6C701.2,181.8,709.7,189.4,726.1,189.4z"/>
                    <path class="st1" d="M980,65.7v141.6c0,48.5-31.5,73.7-79.4,73.7c-46.7,0-69.7-25.2-77.6-47.9l34.3-14.9c5.2,17.3,17.9,30.6,42.8,30.6c24.9,0,41.8-13.3,41.8-42.5v-14.6h-3c-8.5,11.8-23,23.7-49.1,23.7c-35.8,0-67.9-30.3-67.9-77s32.1-77,67.9-77c26.1,0,40.6,11.5,49.7,24.6h3V65.7H980z M936.5,138.5c0-24.6-15.9-39.9-37.2-39.9s-37.2,15.3-37.2,39.9s15.9,39.9,37.2,39.9S936.5,163.1,936.5,138.5z"/>
                    <path class="st1" d="M1076.8,61.5c44.3,0,73.1,31.5,73.1,77.6v13h-109.5c0.9,20.6,17,35.5,38.2,35.5c21.2,0,30-11.5,35.2-23l31.2,16.4c-8.5,16.1-26.4,39.4-67.6,39.4c-44.9,0-76.1-31.5-76.1-79.4S1032.5,61.5,1076.8,61.5z M1111,123.6c-1.8-17.3-14.9-29.4-34.6-29.4c-20.6,0-33.4,12.7-35.8,29.4H1111z"/>
                    <path class="st1" d="M1210.1,65.7v22.4h3c6.1-12.7,18.8-24.9,46.4-24.9c35.2,0,58.5,25.8,58.5,63.1v89.8h-38.2v-87.9c0-22.7-11.5-34-32.1-34c-23.3,0-37,16.4-37,44.3v77.6h-38.2V65.7H1210.1z"/>
                    <path class="st1" d="M1325.6,65.7h37.6V19h38.2v46.7h41.2v30.9h-41.2v79.4c0,6.1,3,9.1,8.5,9.1h29.1v30.9h-42.5c-20,0-33.4-13.3-33.4-34V96.6h-37.6V65.7z"/>
                </svg>
            </a>
        </div>
    </div>

    <section class="bg-white">
        <div class="max-w-7xl text-center mx-auto px-8 py-16 space-y-16 lg:py-32">
            <div class="space-y-4">
                <h3 class="leading-tight font-heading font-bold text-gray-900 text-5xl">
                    <span>
                        What is the
                    </span>

                    <span class="text-primary-500">
                        TALL stack?
                    </span>
                </h3>

                <h4 class="text-gray-700 text-xl max-w-2xl mx-auto">
                    The TALL stack is a set of technologies that full-stack Laravel developers use to build dynamic, maintainable applications quickly
                </h4>
            </div>

            <div class="grid gap-16 sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex items-center justify-center">
                    <a
                        href="https://tailwindcss.com"
                        target="_blank"
                        class="block"
                    >
                        <img
                            src="/images/tailwind.svg"
                            alt="Tailwind CSS"
                            class="w-full max-w-xs transition hover:scale-105"
                        />
                    </a>
                </div>

                <div class="flex items-center justify-center">
                    <a
                        href="https://alpinejs.dev"
                        target="_blank"
                        class="block"
                    >
                        <img
                            src="/images/alpine.svg"
                            alt="Alpine.js"
                            class="w-full max-w-xs transition hover:scale-105"
                        />
                    </a>
                </div>

                <div class="flex items-center justify-center">
                    <a
                        href="https://laravel.com"
                        target="_blank"
                        class="block"
                    >
                        <img
                            src="/images/laravel.svg"
                            alt="Laravel"
                            class="w-full max-w-xs transition hover:scale-105"
                        />
                    </a>
                </div>

                <div class="flex items-center justify-center">
                    <a
                        href="https://laravel-livewire.com"
                        target="_blank"
                        class="block"
                    >
                        <img
                            src="/images/livewire.svg"
                            alt="Livewire"
                            class="w-full max-w-xs transition hover:scale-105"
                        />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-8 py-16 space-y-16 lg:space-y-32 lg:py-32">
            <h3 class="font-heading text-center font-bold text-white text-5xl">
                Our Packages
            </h3>

            <div class="grid lg:grid-cols-2 xl:grid-cols-5 gap-8 lg:gap-16">
                <div class="xl:col-span-3 flex items-center">
                    <img src="{{ asset('images/admin.jpg') }}" class="overflow-hidden rounded-lg" />
                </div>

                <div class="xl:col-span-2 flex items-center">
                    <div class="space-y-8">
                        <div class="space-y-2">
                            <h3 class="font-heading font-bold text-white text-4xl">
                                <span>
                                    Admin Panel
                                </span>

                                <span class="font-sans text-medium text-xl text-primary-500">
                                    v2
                                </span>
                            </h3>

                            <div class="text-lg text-gray-200 space-y-2">
                                <p>
                                    A fully-featured <span class="font-medium">Laravel admin panel</span>.
                                </p>

                                <p>
                                    Build <a href="/docs/forms/tables" class="font-medium transition hover:text-primary-100">complex and interactive tables</a>, complete with sort, search and filter functionalities, easily.
                                </p>

                                <p>
                                    Craft <a href="/docs/forms/forms" class="font-medium transition hover:text-primary-100">intuitive forms</a> using a wide range of field types, using our simple, class-based form builder.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <x-composer-command package="filament/filament" />
                            </div>

                            <div>
                                <a href="https://demo.filamentphp.com" target="_blank" class="block text-white transition hover:text-primary-100 font-medium text-lg">
                                    Demo &rarr;
                                </a>

                                <a href="/docs/admin" class="block text-white transition hover:text-primary-100 font-medium text-lg">
                                    Documentation &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-flow-row-dense lg:grid-cols-2 xl:grid-cols-5 gap-8 lg:gap-16">
                <div class="lg:col-start-2 xl:col-start-3 xl:col-span-3 flex items-center">
                    <img src="{{ asset('images/forms.jpg') }}" class="overflow-hidden rounded-lg" />
                </div>

                <div class="lg:col-start-1 xl:col-span-2 flex items-center">
                    <div class="space-y-8">
                        <div class="space-y-2">
                            <h3 class="font-heading font-bold text-white text-4xl">
                                <span>
                                    Form Builder
                                </span>

                                <span class="font-sans text-medium text-xl text-primary-500">
                                    v2
                                </span>
                            </h3>

                            <div class="text-lg text-gray-200 space-y-2">
                                <p>
                                    An intuitive <span class="font-medium">Laravel form builder</span>.
                                </p>

                                <p>
                                    Generate <a href="/docs/forms/components#date-time-picker" class="font-medium transition hover:text-primary-100">date pickers</a>, searchable <a href="/docs/forms/components#select" class="font-medium transition hover:text-primary-100">select menus</a>, <a href="/docs/forms/components#rich-editor" class="font-medium transition hover:text-primary-100">rich text editors</a> and <a href="/docs/forms/components#file-upload" class="font-medium transition hover:text-primary-100">file upload</a> fields with just one line of PHP.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <x-composer-command package="filament/forms" />
                            </div>

                            <div>
                                <a href="/docs/forms" class="text-white transition hover:text-primary-100 font-medium text-lg">
                                    Documentation &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 xl:grid-cols-5 gap-8 lg:gap-16">
                <div class="xl:col-span-3 flex items-center">
                    <img src="{{ asset('images/tables.jpg') }}" class="overflow-hidden rounded-lg" />
                </div>

                <div class="xl:col-span-2 flex items-center">
                    <div class="space-y-8">
                        <div class="space-y-2">
                            <h3 class="font-heading font-bold text-white text-4xl">
                                <span>
                                    Table Builder
                                </span>

                                <span class="font-sans text-medium text-xl text-primary-500">
                                    v2
                                </span>
                            </h3>

                            <div class="text-lg text-gray-200 space-y-2">
                                <p>
                                    An interactive <span class="font-medium">Laravel table builder</span>.
                                </p>

                                <p>
                                    Build custom datatables, complete with sort, search and filter functionalities, with a simple PHP interface.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <x-composer-command package="filament/tables" />
                            </div>

                            <div>
                                <a href="/docs/tables" class="text-white transition hover:text-primary-100 font-medium text-lg">
                                    Documentation &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex justify-center">
                <div class="bg-gray-800 relative rounded-2xl -mx-4 p-8 space-y-8 max-w-4xl text-center">
                    <div class="space-y-4">
                        <h2 class="text-white font-heading font-bold text-2xl">
                            ...and these are just the beginning.
                        </h2>

                        <p class="text-xl text-white">
                            The Filament community is <strong>exceptional</strong>. They've built a wide range of plugins, which give you easy access to new features that will make your productivity ✨ shine ✨.
                        </p>
                    </div>

                    <x-button
                        :href="route('plugins')"
                        tag="a"
                        size="lg"
                    >
                        Check out our plugins &rarr;
                    </x-button>

                    <div class="absolute -top-12 -right-4">
                        <img
                            src="{{ asset('images/bit3.svg') }}"
                            alt="Bit"
                            class="h-16"
                        />
                    </div>

                    <div class="absolute -bottom-4 -left-8">
                        <img
                            src="{{ asset('images/bit6.svg') }}"
                            alt="Bit"
                            class="h-16"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-pink-500">
        <div class="relative lg:flex items-center space-y-16 max-w-7xl mx-auto px-8 py-32 lg:space-y-0 lg:space-x-16">
            <div class="grid grid-cols-10 gap-2 shrink-0">
                @foreach([
                    'https://github.com/calebporzio' => 'https://avatars.githubusercontent.com/u/3670578?s=96&v=4',
                    'https://github.com/spatie' => 'https://avatars.githubusercontent.com/u/7535935?s=96&v=4',
                    'https://github.com/Cannonb4ll' => 'https://avatars.githubusercontent.com/u/3110750?s=96&v=4',
                    'https://github.com/ohdearapp' => 'https://avatars.githubusercontent.com/u/32144649?s=96&v=4',
                    'https://github.com/larrybarker' => 'https://avatars.githubusercontent.com/u/28734844?s=96&v=4',
                    'https://github.com/jouniikaheimo' => 'https://avatars.githubusercontent.com/u/32259223?s=96&v=4',
                    'https://github.com/jeffgreco13' => 'https://avatars.githubusercontent.com/u/12453974?s=96&v=4',
                    'https://github.com/blinkinglight' => 'https://avatars.githubusercontent.com/u/39296?s=96&v=4',
                    'https://github.com/jhoff' => 'https://avatars.githubusercontent.com/u/627060?s=96&v=4',
                    'https://github.com/buzkall' => 'https://avatars.githubusercontent.com/u/5702?s=96&v=4',
                    'https://github.com/intrepidws' => 'https://avatars.githubusercontent.com/u/125735?s=96&v=4',
                    'https://github.com/johncarter-' => 'https://avatars.githubusercontent.com/u/3776888?s=96&v=4',
                    'https://github.com/roni-estein' => 'https://avatars.githubusercontent.com/u/8517475?s=96&v=4',
                    'https://github.com/looxisdev' => 'https://avatars.githubusercontent.com/u/25901673?s=96&v=4',
                    'https://github.com/ssmusoke' => 'https://avatars.githubusercontent.com/u/689900?s=96&v=4',
                    'https://github.com/adam-code-labx' => 'https://avatars.githubusercontent.com/u/53559175?s=96&v=4',
                    'https://github.com/joselara' => 'https://avatars.githubusercontent.com/u/1036420?s=96&v=4',
                    'https://github.com/s-sadiq' => 'https://avatars.githubusercontent.com/u/3797475?s=96&v=4',
                    'https://github.com/blackpig' => 'https://avatars.githubusercontent.com/u/1029317?s=96&v=4',
                    'https://github.com/joshuablum' => 'https://avatars.githubusercontent.com/u/3824203?s=96&v=4',
                    'https://github.com/macscr' => 'https://avatars.githubusercontent.com/u/1404944?s=96&v=4',
                    'https://github.com/rabol' => 'https://avatars.githubusercontent.com/u/1177191?s=96&v=4',
                    'https://github.com/rexlManu' => 'https://avatars.githubusercontent.com/u/32296940?s=96&v=4',
                    'https://github.com/gavinhewitt' => 'https://avatars.githubusercontent.com/u/1969103?s=96&v=4',
                    'https://github.com/sebastiaankloos' => 'https://avatars.githubusercontent.com/u/6506510?s=96&v=4',
                    'https://github.com/pxlrbt' => 'https://avatars.githubusercontent.com/u/22632550?s=96&v=4',
                    'https://github.com/lukasleitsch' => 'https://avatars.githubusercontent.com/u/3009245?s=96&v=4',
                    'https://github.com/elelas' => 'https://avatars.githubusercontent.com/u/10687213?s=96&v=4',
                    'https://github.com/basepack' => 'https://avatars.githubusercontent.com/u/939500?s=96&v=4',
                    'https://github.com/lara-zeus' => 'https://avatars.githubusercontent.com/u/85035829?s=96&v=4',
                    'https://github.com/tanthammar' => 'https://avatars.githubusercontent.com/u/21239634?s=96&v=4',
                    'https://github.com/jszobody' => 'https://avatars.githubusercontent.com/u/203749?s=96&v=4',
                    'https://github.com/saade' => 'https://avatars.githubusercontent.com/u/14329460?s=96&v=4',
                    'https://github.com/swilla' => 'https://avatars.githubusercontent.com/u/304159?s=96&v=4',
                    'https://github.com/cigoler' => 'https://avatars.githubusercontent.com/u/2905728?s=96&v=4',
                    'https://github.com/jwohlfert23' => 'https://avatars.githubusercontent.com/u/2797531?s=96&v=4',
                    'https://github.com/swara-mohammed' => 'https://avatars.githubusercontent.com/u/9349190?s=96&v=4',
                    'https://github.com/ap1969' => 'https://avatars.githubusercontent.com/u/1629592?s=96&v=4',
                    'https://github.com/martin-ro' => 'https://avatars.githubusercontent.com/u/10107779?s=96&v=4',
                    'https://github.com/cheesegrits' => 'https://avatars.githubusercontent.com/u/934456?s=96&v=4',
                    'https://github.com/dgironella' => 'https://avatars.githubusercontent.com/u/26429549?s=96&v=4',
                    'https://github.com/jimmyaldape' => 'https://avatars.githubusercontent.com/u/59585840?s=96&v=4',
                    'https://github.com/clausmunch' => 'https://avatars.githubusercontent.com/u/701248?s=96&v=4',
                    'https://github.com/hansenhalim' => 'https://avatars.githubusercontent.com/u/29351920?s=96&v=4',
                    'https://github.com/invaders-xx' => 'https://avatars.githubusercontent.com/u/604907?s=96&v=4',
                    'https://github.com/pablorica' => 'https://avatars.githubusercontent.com/u/4438775?s=96&v=4',
                    'https://github.com/ajnsn' => 'https://avatars.githubusercontent.com/u/13928621?s=96&v=4',
                    'https://github.com/ChrisHardie' => 'https://avatars.githubusercontent.com/u/311772?s=96&v=4',
                    'https://github.com/gbrust' => 'https://avatars.githubusercontent.com/u/16957069?s=96&v=4',
                    'https://github.com/awcodes' => 'https://avatars.githubusercontent.com/u/3596800?s=96&v=4',
                ] as $url => $avatar)
                    <a
                        href="{{ $url }}"
                        target="_blank"
                    >
                        <img src="{{ $avatar }}" class="rounded-full w-12 mx-auto" />
                    </a>
                @endforeach
            </div>

            <div class="flex-grow space-y-8">
                <div class="space-y-4">
                    <h2 class="font-heading font-bold text-primary-200 text-4xl">
                        Our sponsors
                    </h2>

                    <p class="text-xl text-white">
                        Filament is open source at heart. To allow us to <strong>build new features</strong>, <strong>fix bugs</strong>, and <strong>run the community</strong>, we require your financial support.
                    </p>
                </div>

                <a
                    href="https://github.com/sponsors/danharrin"
                    target="_blank"
                    class="group inline-flex items-center justify-center px-6 text-lg sm:text-xl font-semibold tracking-tight text-white transition rounded-lg h-11 ring-2 ring-inset ring-white hover:bg-primary-200 hover:text-pink-500 hover:ring-primary-200 focus:ring-primary-200 focus:text-pink-500 focus:bg-primary-200 focus:outline-none"
                >
                    Sponsor Filament on GitHub

                    <x-heroicon-o-heart class="ml-2 -mr-3 w-7 h-7 transition-all group-hover:scale-125" />
                </a>
            </div>

            <div class="hidden absolute right-0 top-12 mr-12 xl:block">
                <img
                    src="{{ asset('images/diamond.svg') }}"
                    alt="Diamond"
                    class="h-[8rem]"
                />
            </div>
        </div>
    </section>

    <section class="relative max-w-7xl mx-auto px-8 py-32">
        <div class="space-y-16">
            <h2 class="font-heading font-bold text-4xl text-center">
                Here's what others say
            </h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <x-testimonial url="https://twitter.com/shocm/status/1487841457088045059">
                    Filament has become <strong>one of my required packages</strong> for all my new projects. I talk about it almost as much as I talk about Livewire and <strong>that is a lot</strong>. Thanks for the <strong>great work</strong>.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/89408?v=4">
                        Eric Van Johnson
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/ChrisHardie/status/1507793007470428167">
                    I’ve built a few Laravel admin tools/sites now with Filament and just have to remark on how <strong>well designed</strong> it is, and how quickly one can create <strong>powerful, friendly</strong> application interfaces with it. <strong>Impressive stuff.</strong>

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/311772?v=4">
                        Chris Hardie
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/mrchrxs/status/1491159440250540033">
                    6 months ago, @carre_sam recommended Filament. I was put off because I use Vue not Livewire. Just spent 30 minutes with it, and <strong>WOW</strong>. Definitely pitching this at work!

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/10789117?v=4">
                        Chris
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/iksaku2">
                    Filament is the <strong>Swiss Army Knife dashboard for TALL stack apps</strong>. Just sit down, install and you'll have a full CMS in two shakes.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/4632429?v=4">
                        Jorge González
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/DaronSpence/status/1507602035641929729">
                    Big shoutout to Filament for making a <strong>really slick</strong> admin panel kit. <strong>Loving the markdown editor</strong> w/ builtin file uploads!

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/4062087?v=4">
                        Daron Spence
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/jacques_van_wyk/status/1507401233937711104">
                    I must say this Filament is <strong>amazing</strong> and such <strong>a pleasure to work with</strong>. @danjharrin you and team have done great job.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/12008702?v=4">
                        Jacques van Wyk
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/heyjordn/status/1494428799584329730">
                    <strong>Loving the performance</strong> of Filament's datatable, our team at Orba added an Excel export, <strong>so smooth</strong> 🔥

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/4820517?v=4">
                        Jordan Jones
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/ralphjsmit/status/1502305847749357572">
                    Filament is a <strong>GREAT</strong> tool for building admin panels in Laravel. It has a great plugin support and an <strong>active community</strong>. 🚀

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/59207045?v=4">
                        Ralph J. Smit
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/larsklopstra">
                    Filament is a <strong>great CMS solution</strong> for both technical and non-technical users, and the fluent API is a <strong>developer's dream!</strong>

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/25669876?v=4">
                        Lars Klopstra
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/andreas_kviby/status/1367824016380166144">
                    What else can you wish for? <strong>Filament rocks</strong>! This will be my <strong>first choice</strong> when creating adminpanels for clients from this day and forward.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/1666004?v=4">
                        Andreas Kviby
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/adamlee_clx/status/1380910055411748868">
                    I absolutely love developing with TALL stack. Filament is going to <strong>save a lot of time</strong> with the overall development process!!

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/53559175?v=4">
                        Adam Lee
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/DominikGeimer/status/1416114759179571202">
                    I just started using Filament by Dan Harrin, Ryan Chandler and Ryan Scherler. <strong>I am really impressed</strong>. Thank you for that great tool.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/6383607?v=4">
                        Dominik Geimer
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/jimmyaldape/status/1504641233871728640">
                    Filament is a <strong>joy to work with</strong>. Just about covers most use cases for an admin panel in Laravel. <strong>Great job.</strong>

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/59585840?v=4">
                        Jimmy Aldape
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/mattmngdev/status/1495358748445057025">
                    The <strong>highlight of the weekend</strong>: managed to start a new project using Filament and <strong>I love it</strong>.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/373999?v=4">
                        Matteo Mangoni
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/romaldyminaya/status/1492553584587776004">
                    Filament is a <strong>very fun framework</strong> to play with so far. The support is <strong>very accurate and fast</strong>. 😍

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/2809147?v=4">
                        Romaldy Minaya
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/BotezatuDima/status/1491026512111226881">
                    Today I installed and played with Filament. Seems to be an <strong>amazing tool for productivity</strong>.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/3392129?v=4">
                        Dumitru Botezatu
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/zepfietje/status/1486763133591072768">
                    Need an admin panel for your Laravel project? It's <strong>powerful</strong>. It's <strong>fast</strong>. It's <strong>beautiful</strong>. It's <strong>easy</strong>.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/44533235?v=4">
                        Zep Fietje
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/luilliarcec/status/1485764353802608643">
                    Today I tried Filament, and <strong>oh my God, that's fantastic! Amazing! Great job.</strong>

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/27895611?v=4">
                        Luis Andrés Arce C.
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/nickciolpan/status/1483564450208747520">
                    Filament's admin is, by far, <strong>my favorite Laravel tool</strong> at the moment. Found my gateway drug into Livewire

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/8835763?v=4">
                        Nick Ciolpan
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/snellingio/status/1491103335793164290">
                    The more I look at it, the closer it is to being able to build a <strong>full SaaS with Filament alone</strong>.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/9887585?v=4">
                        Sam Snelling
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/roniestein/status/1366526433737068546">
                    Release the hounds!!! This project is going to be <strong>my new go-to</strong> for all back-end work!!! So Excited!

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/8517475?v=4">
                        Roni Estein
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/LabsArtisan/status/1368248886725402625">
                    👍 been using it today and I’ve got to say <strong>it's brilliant.</strong>

                    <x-slot name="author" avatar="https://pbs.twimg.com/profile_images/1294198577833615360/ifwIsmKp_400x400.jpg">
                        Artisan Labs
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/alexjustesen/status/1496554096777695233">
                    Hot damn Filament <strong>saves sooooo much time</strong>.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/1144087?v=4">
                        Alex Justesen
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/Tiago_Ferat/status/1367996436567179264">
                    An <strong>awesome</strong> Open-Source Admin panel with TALL stack. 👏👏

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/11933789?v=4">
                        Tiago Rodrigues
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/kiltedup/status/1366526387180482567">
                    Just installed and had a play. <strong>Really great job.</strong>

                    <x-slot name="author" avatar="https://pbs.twimg.com/profile_images/1251922928469446664/IxVNvpzG_400x400.jpg">
                        Dave Walker
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/theraloss/status/1367975271949864969">
                    Filament is <strong>damn smooth.</strong>

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/6277291?v=4">
                        Danilo Polani
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/mskhoshnazar/status/1423181010850746371">
                    Filament was a <strong>joy to use.</strong>

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/6499685?v=4">
                        Mo Khosh
                    </x-slot>
                </x-testimonial>
            </div>
        </div>

        <div class="hidden absolute top-0 right-0 mt-20 -mr-40 2xl:block">
            <img
                src="{{ asset('images/worm.svg') }}"
                alt="Worm"
                class="h-[8rem]"
            />
        </div>

        <div class="hidden absolute bottom-0 mb-96 -ml-48 2xl:block">
            <img
                src="{{ asset('images/fish.svg') }}"
                alt="Fish"
                class="h-[8rem]"
            />
        </div>
    </section>

    <section class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-8 py-32 space-y-16">
            <h2 class="font-heading font-bold text-white text-4xl text-center">
                Meet the team
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                <x-team-member
                    name="Ryan Chandler"
                    avatar="https://avatars.githubusercontent.com/u/41837763?v=4"
                    github="https://github.com/ryangjchandler"
                    twitter="https://twitter.com/ryangjchandler"
                />

                <x-team-member
                    name="Dan Harrin"
                    avatar="https://avatars.githubusercontent.com/u/41773797?v=4"
                    github="https://github.com/danharrin"
                    twitter="https://twitter.com/danjharrin"
                />

                <x-team-member
                    name="Ryan Scherler"
                    avatar="https://avatars.githubusercontent.com/u/881938?v=4"
                    github="https://github.com/ryanscherler"
                    twitter="https://twitter.com/ryanscherler"
                />
            </div>
        </div>
    </section>
</x-layouts.app>
