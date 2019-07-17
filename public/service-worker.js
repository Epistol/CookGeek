importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');
if (workbox) {

    // top-level routes we want to precache
    workbox.precaching.precacheAndRoute(['/', '/recipe']);

    // injected assets by Workbox CLI
    workbox.precaching.precacheAndRoute([
  {
    "url": "0.js",
    "revision": "cf03d592db27fe81e3542adc116a9699"
  },
  {
    "url": "1.js",
    "revision": "63961f2fcfb562fe01634b8ef636fa4c"
  },
  {
    "url": "10.js",
    "revision": "6c9f256da0705e6e32d024cbe9125660"
  },
  {
    "url": "11.js",
    "revision": "d2cef5f822a4b11bf9ad3765f145070a"
  },
  {
    "url": "12.js",
    "revision": "e071e4de40cefe7387b592edfb8a2349"
  },
  {
    "url": "13.js",
    "revision": "fc64a7f7208d948ecf5e92fc69fe2562"
  },
  {
    "url": "14.js",
    "revision": "f0e39809a6c56f4d759ea272e9533c35"
  },
  {
    "url": "15.js",
    "revision": "e0a3d153d92cac63a6290201e81b6cef"
  },
  {
    "url": "16.js",
    "revision": "4447587c84f49552c0ff9f2f17fb23d0"
  },
  {
    "url": "17.js",
    "revision": "ec8594d05bc27497dfa68cf2e9c6562b"
  },
  {
    "url": "18.js",
    "revision": "7fd6c86da7ef8aec608ef302b085c20c"
  },
  {
    "url": "19.js",
    "revision": "380ce49927b3a23d0eb5bd87a72430b8"
  },
  {
    "url": "2.js",
    "revision": "40a91bbe4f427aa785d79957eafa9396"
  },
  {
    "url": "20.js",
    "revision": "cf77e36b4bfeec17e11a72f0f2248e5e"
  },
  {
    "url": "21.js",
    "revision": "72d1d42c91ec53d64f6927adf6538849"
  },
  {
    "url": "22.js",
    "revision": "702258e71b18db8e1800f1320593f028"
  },
  {
    "url": "23.js",
    "revision": "caf0b86f8496732a0616d927eb4b5d1e"
  },
  {
    "url": "24.js",
    "revision": "1687ae59ad0bd8e6aac10bb6a5bd9661"
  },
  {
    "url": "25.js",
    "revision": "ac6568a6e79eaca24209c9cebe9f7eac"
  },
  {
    "url": "26.js",
    "revision": "56ff965769efd9aaf7d644f6ba945592"
  },
  {
    "url": "3.js",
    "revision": "c84ef4942760c61f858ec447ebbf182c"
  },
  {
    "url": "4.js",
    "revision": "47ce98f0320dc15e1db2c5ea22bb9d40"
  },
  {
    "url": "5.js",
    "revision": "dbf9483e10359bcf43c1f2bcdcabfb9c"
  },
  {
    "url": "6.js",
    "revision": "a6e643bec2d24a597d3c166c7263e851"
  },
  {
    "url": "7.js",
    "revision": "346c7bae7974773878b5eecdb146ed0f"
  },
  {
    "url": "8.js",
    "revision": "67876ede6a3b59287ecc1b7e1a826605"
  },
  {
    "url": "9.js",
    "revision": "7630b61513ac3f7946e2b5f65265518e"
  },
  {
    "url": "android-chrome-192x192.png",
    "revision": "41a31ed0431cfae71ed21561ff6d450c"
  },
  {
    "url": "android-chrome-512x512.png",
    "revision": "5222325a5789c684dea7030b899fe6de"
  },
  {
    "url": "apple-touch-icon.png",
    "revision": "ede1de79c12de1808f589ede6ae9c5b9"
  },
  {
    "url": "browserconfig.xml",
    "revision": "e9207887add1d110a9c418ec96465f2f"
  },
  {
    "url": "css/admin.css",
    "revision": "97c2088ed2af68137356f62c01ce096c"
  },
  {
    "url": "css/app.css",
    "revision": "41874abe87891fe9d4634d50f45c23da"
  },
  {
    "url": "css/default.css",
    "revision": "2bd355b6557c287e187e95122cedf766"
  },
  {
    "url": "css/lightbox.css",
    "revision": "a2411d138dc672246a08f18b75196314"
  },
  {
    "url": "css/lightbox.min.css",
    "revision": "fa7975a97d2a55c3d5b832ec1dccfc8b"
  },
  {
    "url": "css/nouislider.min.css",
    "revision": "0beb51f7aadcbf3f788e4e8a3ad3d11a"
  },
  {
    "url": "css/print.css",
    "revision": "61baf34bdfff5eb605105a506554c00b"
  },
  {
    "url": "favicon (1).ico",
    "revision": "6181c081a39ff29798ca6db11ecf947b"
  },
  {
    "url": "favicon-16x16.png",
    "revision": "99dd412affe6f14de08e0c6b85a181a6"
  },
  {
    "url": "favicon-32x32.png",
    "revision": "1780e98b2bffa2f0c294acc529a447be"
  },
  {
    "url": "favicon.ico",
    "revision": "2bf64d4ee4ba09acd4905fa932cc9970"
  },
  {
    "url": "favicon.png",
    "revision": "952de977505048fc09ec202a9294f57e"
  },
  {
    "url": "fonts/glyphicons-halflings-regular.svg",
    "revision": "89889688147bd7575d6327160d64e760"
  },
  {
    "url": "fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.svg",
    "revision": "89889688147bd7575d6327160d64e760"
  },
  {
    "url": "images/icons/icon-128x128.png",
    "revision": "3e7db4d73e8129de62371d5b05d5fcd4"
  },
  {
    "url": "images/icons/icon-144x144.png",
    "revision": "4a1d6474058b153d6a3701db33a63f3c"
  },
  {
    "url": "images/icons/icon-152x152.png",
    "revision": "de4ad4410b0375493c8c0e8d88bd9119"
  },
  {
    "url": "images/icons/icon-192x192.png",
    "revision": "957dfc347925a4809a880c87534d85eb"
  },
  {
    "url": "images/icons/icon-384x384.png",
    "revision": "149f682f0d9357c39f6c9cf5c5c95199"
  },
  {
    "url": "images/icons/icon-512x512.png",
    "revision": "18e8d82d9df4ff90df686811d09339b2"
  },
  {
    "url": "images/icons/icon-72x72.png",
    "revision": "3b79af186cd91681758b03225e69bf5e"
  },
  {
    "url": "images/icons/icon-96x96.png",
    "revision": "38f31e5cc3fc52566a2fbcb14f1a09cc"
  },
  {
    "url": "images/icons/splash-1125x2436.png",
    "revision": "4991d9139ac4a5cca00761448bcc61b4"
  },
  {
    "url": "images/icons/splash-1242x2208.png",
    "revision": "41849a55e70e9af8f55c9d18f6ee6563"
  },
  {
    "url": "images/icons/splash-1242x2688.png",
    "revision": "04936d82edce793f90e2d4af7715703f"
  },
  {
    "url": "images/icons/splash-1536x2048.png",
    "revision": "a13ea6fd727c4e37db172d3371452ed7"
  },
  {
    "url": "images/icons/splash-1668x2224.png",
    "revision": "a0670816158f43b823058da33be87fb4"
  },
  {
    "url": "images/icons/splash-1668x2388.png",
    "revision": "0bd50a4d0a0da075bd1e284e956b49b8"
  },
  {
    "url": "images/icons/splash-2048x2732.png",
    "revision": "163d887752c919b4eccea5bcd5be0a5a"
  },
  {
    "url": "images/icons/splash-640x1136.png",
    "revision": "c9ad775561223eee7802b0f8d4eb3a13"
  },
  {
    "url": "images/icons/splash-750x1334.png",
    "revision": "fe9c9fbe2e7e6b6b0d6663bfeb72fa78"
  },
  {
    "url": "images/icons/splash-828x1792.png",
    "revision": "f68fecc50c9f87e78a323dabaabfd7ef"
  },
  {
    "url": "img/404_bg_orig.jpg",
    "revision": "86ad7072b9cac8967aa37651c0164038"
  },
  {
    "url": "img/404_bg.jpg",
    "revision": "4cc2a13ae7d6d6536afd296499a5bc0f"
  },
  {
    "url": "img/admin/design/Annotations.png",
    "revision": "825b86b2ef0a08812740ca16eafef8dc"
  },
  {
    "url": "img/admin/design/example/icon/atom1.svg",
    "revision": "15fd2f8b5ff65416e81980832366d9f9"
  },
  {
    "url": "img/admin/design/example/icon/molec.svg",
    "revision": "7b5069a8b728ee71928276663acd82aa"
  },
  {
    "url": "img/admin/design/example/icon/organism.svg",
    "revision": "c7e096b48830df3b5f33a034ab8db98d"
  },
  {
    "url": "img/admin/design/example/icon/page.svg",
    "revision": "e4ebd65bd8b289ec48766e16b8705e03"
  },
  {
    "url": "img/admin/design/example/icon/template.svg",
    "revision": "c49bf17bcc6d0640f2e1818262e02006"
  },
  {
    "url": "img/bg_space/Asset 1@1.5x.png",
    "revision": "523099f49356f49d8457fc465837c458"
  },
  {
    "url": "img/bg_space/Asset 1@2x-90.jpg",
    "revision": "30132df0acb0a4b34436feb325657bd6"
  },
  {
    "url": "img/bg_space/Asset 1@2x.png",
    "revision": "e440ee5c1f51fcf9080ee62074c7e34b"
  },
  {
    "url": "img/bg_space/Asset 1@3x.png",
    "revision": "2b3ebd0b1285f85941a1a59ca4f49940"
  },
  {
    "url": "img/bg_space/Asset 1@4x.png",
    "revision": "7141e0afccbe46892e7b88757757b2b0"
  },
  {
    "url": "img/bg_space/Asset_1.png",
    "revision": "1dcc77c609c3ff91ad7ec0b0a5d74b39"
  },
  {
    "url": "img/cdglogo_orig.png",
    "revision": "f1979084f7d7667ac84832d04c4645bc"
  },
  {
    "url": "img/cdglogo.png",
    "revision": "47507468fe25317906d4afece016672b"
  },
  {
    "url": "img/chat_mascotte_orig.png",
    "revision": "783175c9e36368804c2e036666296254"
  },
  {
    "url": "img/chat_mascotte.png",
    "revision": "d1778d188a103e3b436fda20af05b278"
  },
  {
    "url": "img/full_bg_media/anime.png",
    "revision": "b9ed138673b73374d38abb977d8503b2"
  },
  {
    "url": "img/full_bg_media/art.png",
    "revision": "0d3e2cd312a2d054ae60bfc970ea6685"
  },
  {
    "url": "img/full_bg_media/comics.png",
    "revision": "5e4fd2b8d6cba473f05252c79dbd11da"
  },
  {
    "url": "img/full_bg_media/gaming.png",
    "revision": "1fdb6c50b7eb661351de5857d98faf04"
  },
  {
    "url": "img/full_bg_media/livres.png",
    "revision": "50f792714d9fc3e569fdc85de524f262"
  },
  {
    "url": "img/full_bg_media/manga.png",
    "revision": "22d2cf5f1f9137703b3ce5b7b918a274"
  },
  {
    "url": "img/full_bg_media/tv.png",
    "revision": "f51b5b4eedc029cdd2465dae1c4b1a88"
  },
  {
    "url": "img/glaces/Asset 2.png",
    "revision": "29a057c0fd0fadcd03fca1b4791a3bea"
  },
  {
    "url": "img/glaces/Asset 2@1.5x.png",
    "revision": "9866543f25c5e1e76baccfc80e31fcd3"
  },
  {
    "url": "img/glaces/Asset 2@2x-90.jpg",
    "revision": "47cfa62582622a7e782533aef4821181"
  },
  {
    "url": "img/glaces/Asset 2@2x.png",
    "revision": "0f922aadbc2177e5c97165a54fcd0f8f"
  },
  {
    "url": "img/glaces/Asset 2@3x.png",
    "revision": "c88a78cec6bc711cc68d677de09c6381"
  },
  {
    "url": "img/glaces/Asset 2@4x.png",
    "revision": "bb952e22a190890996d916bd65606c85"
  },
  {
    "url": "img/icons/a_to_z.png",
    "revision": "13be8929a36477289961f98c56664734"
  },
  {
    "url": "img/icons/a_to_z.svg",
    "revision": "e2d4928c0777035eecdc89ad91e5dae4"
  },
  {
    "url": "img/icons/add_round.png",
    "revision": "2c99977dee717db0c16fb0421ed45ceb"
  },
  {
    "url": "img/icons/add_round.svg",
    "revision": "d7bc2c3f177e542768da171a82457cb4"
  },
  {
    "url": "img/icons/ingredients.png",
    "revision": "96312ab59e62a1352d434a6225c9e7d6"
  },
  {
    "url": "img/icons/ingredients.svg",
    "revision": "6e66484d54c7e5e454e47cef579ee0b0"
  },
  {
    "url": "img/icons/menu_icon.png",
    "revision": "82d6834ce0625bc18d86039013e8aecd"
  },
  {
    "url": "img/icons/menu_icon.svg",
    "revision": "b9c090e02534999b16b530e563e35319"
  },
  {
    "url": "img/icons/news.png",
    "revision": "60d032d0a194599ebf0e1a38cc3d2783"
  },
  {
    "url": "img/icons/news.svg",
    "revision": "34fb840141bef192746a13f36f945832"
  },
  {
    "url": "img/ILLUSTRATION_twitter_cdg.png",
    "revision": "869b3a957d17426be5405054697f99a2"
  },
  {
    "url": "img/ILLUSTRATION_twitter_exact.png",
    "revision": "aeebf96660ce2acd20e15723508652b7"
  },
  {
    "url": "img/images/close.png",
    "revision": "d9d2d0b1308cb694aa8116915592e2a9"
  },
  {
    "url": "img/images/next.png",
    "revision": "31f15875975aab69085470aabbfec802"
  },
  {
    "url": "img/images/prev.png",
    "revision": "84b76dee6b27b795e89e3649078a11c2"
  },
  {
    "url": "img/logo_round_orig.png",
    "revision": "952de977505048fc09ec202a9294f57e"
  },
  {
    "url": "img/logo-2-version-2-CC.png",
    "revision": "1991b49762f921ff705acbb33ea41f36"
  },
  {
    "url": "img/logo-2-version-3-CC.png",
    "revision": "50c3533f07f258f1fa8828eeaa2aaf0e"
  },
  {
    "url": "img/logo-2-version-4-CC.png",
    "revision": "f1979084f7d7667ac84832d04c4645bc"
  },
  {
    "url": "img/logoo_rond.png",
    "revision": "455b70bc6fe247213d89de5ef979c4ec"
  },
  {
    "url": "img/loog_txt.png",
    "revision": "02881dedc2d33bb99993e364e99a665c"
  },
  {
    "url": "img/medias/full/anime.png",
    "revision": "b9ed138673b73374d38abb977d8503b2"
  },
  {
    "url": "img/medias/full/art.png",
    "revision": "0d3e2cd312a2d054ae60bfc970ea6685"
  },
  {
    "url": "img/medias/full/gaming.png",
    "revision": "1fdb6c50b7eb661351de5857d98faf04"
  },
  {
    "url": "img/medias/full/livres.png",
    "revision": "50f792714d9fc3e569fdc85de524f262"
  },
  {
    "url": "img/medias/full/manga.png",
    "revision": "22d2cf5f1f9137703b3ce5b7b918a274"
  },
  {
    "url": "img/medias/full/tv.png",
    "revision": "f51b5b4eedc029cdd2465dae1c4b1a88"
  },
  {
    "url": "img/partners/laravel-logo-white.png",
    "revision": "3965add7c3c3703ad6b41254a8664767"
  },
  {
    "url": "img/partners/led.jpg",
    "revision": "5c1076dc7cf05b3e41a7859efebc68a9"
  },
  {
    "url": "img/partners/logo-auchan-direct.svg",
    "revision": "58dded1ca2878721bff3345fb07a8621"
  },
  {
    "url": "img/pictos/Android/anime.svg",
    "revision": "b213eaf9823dcfbe228bae9c552f821c"
  },
  {
    "url": "img/pictos/Android/animehdpi.png",
    "revision": "f14b3983bbf097893eb8ef9610f7e10d"
  },
  {
    "url": "img/pictos/Android/animeldpi.png",
    "revision": "4530edcf48a36eb4a38107eef56639c4"
  },
  {
    "url": "img/pictos/Android/animemdpi.png",
    "revision": "87527b3d0b9b87b560292eee7e60ae27"
  },
  {
    "url": "img/pictos/Android/animexhdpi.png",
    "revision": "67cbb9806f045ae0862becdc918d6ee8"
  },
  {
    "url": "img/pictos/Android/animexxhdpi.png",
    "revision": "b3ef6065cf0f7d5a2d9cd053b5406a97"
  },
  {
    "url": "img/pictos/Android/animexxxhdpi.png",
    "revision": "7783fbf21855d439404174d037c5f75b"
  },
  {
    "url": "img/pictos/Android/art.svg",
    "revision": "83ad0a198c96e4601de9e96a8e23d1e3"
  },
  {
    "url": "img/pictos/Android/arthdpi.png",
    "revision": "7e61e59c9e0736f21d71d426102e8d79"
  },
  {
    "url": "img/pictos/Android/artldpi.png",
    "revision": "f048a507b066344d16605df10a07a0fb"
  },
  {
    "url": "img/pictos/Android/artmdpi.png",
    "revision": "58c6d512734dc87fabbace338d4015e5"
  },
  {
    "url": "img/pictos/Android/artxhdpi.png",
    "revision": "6bb05388f0274ce2269af263836da015"
  },
  {
    "url": "img/pictos/Android/artxxhdpi.png",
    "revision": "5cc49b0989c78fe0e6547aa8bcba4300"
  },
  {
    "url": "img/pictos/Android/artxxxhdpi.png",
    "revision": "595998b0687e97363eb20d7b5b507c27"
  },
  {
    "url": "img/pictos/Android/cartes.svg",
    "revision": "457fb341b2c5db296276908ee329d1e0"
  },
  {
    "url": "img/pictos/Android/carteshdpi.png",
    "revision": "81cc56d5ee1602b8c001adec50628cac"
  },
  {
    "url": "img/pictos/Android/cartesldpi.png",
    "revision": "115b68a0406672c3adaf4a48d7e3e22b"
  },
  {
    "url": "img/pictos/Android/cartesmdpi.png",
    "revision": "74c1315c1181c5f3cc890ddff24325f6"
  },
  {
    "url": "img/pictos/Android/cartesxhdpi.png",
    "revision": "6fc83a1769ec2d535847ed1904bf9faa"
  },
  {
    "url": "img/pictos/Android/cartesxxhdpi.png",
    "revision": "66cb84188276b261985f4c68a4eb5337"
  },
  {
    "url": "img/pictos/Android/cartesxxxhdpi.png",
    "revision": "e8e683c3004a800306c9c2fcc99ec3ba"
  },
  {
    "url": "img/pictos/Android/comics.svg",
    "revision": "d0dedef15edf6154304ef6a7ec24d131"
  },
  {
    "url": "img/pictos/Android/comicshdpi.png",
    "revision": "d732d096571a1aa3903c291c81aceee8"
  },
  {
    "url": "img/pictos/Android/comicsldpi.png",
    "revision": "5d36c4c40c30e7d6c7b02250edca3728"
  },
  {
    "url": "img/pictos/Android/comicsmdpi.png",
    "revision": "e674120ed0446ccb79ab7f808634cd31"
  },
  {
    "url": "img/pictos/Android/comicsxhdpi.png",
    "revision": "d598e76215e8691e6d5f1ced12414ad7"
  },
  {
    "url": "img/pictos/Android/comicsxxhdpi.png",
    "revision": "45e88ee868b548ed868b7f49374439a1"
  },
  {
    "url": "img/pictos/Android/comicsxxxhdpi.png",
    "revision": "800b1f083e5631573351b82b47f1b9a0"
  },
  {
    "url": "img/pictos/Android/games.svg",
    "revision": "8dac56bfe36479fb0264cf71f15ac0b2"
  },
  {
    "url": "img/pictos/Android/gameshdpi.png",
    "revision": "84885a19126bfa80ec7a7fbacf9c90c7"
  },
  {
    "url": "img/pictos/Android/gamesldpi.png",
    "revision": "5878e9d85089a7d17c26db035330d149"
  },
  {
    "url": "img/pictos/Android/gamesmdpi.png",
    "revision": "8b4f76194e95582107db3132ccfdfec0"
  },
  {
    "url": "img/pictos/Android/gamesxhdpi.png",
    "revision": "6b0cc6911a1192bf86e370539175ebf4"
  },
  {
    "url": "img/pictos/Android/gamesxxhdpi.png",
    "revision": "5f06ffce6d1818716dbd0e736c16e77d"
  },
  {
    "url": "img/pictos/Android/gamesxxxhdpi.png",
    "revision": "f46d779b8345efd4b3c259f8a21707b2"
  },
  {
    "url": "img/pictos/Android/livres.svg",
    "revision": "9d8588fd14ed9e5ceb6cf223575f97f2"
  },
  {
    "url": "img/pictos/Android/livreshdpi.png",
    "revision": "4b0681265ebbd0311d15e891cad8c989"
  },
  {
    "url": "img/pictos/Android/livresldpi.png",
    "revision": "b0e49dfea4de3d26d6e55900f266c813"
  },
  {
    "url": "img/pictos/Android/livresmdpi.png",
    "revision": "9e13f680d69badf5fde8c0d70537b67f"
  },
  {
    "url": "img/pictos/Android/livresxhdpi.png",
    "revision": "13e17781ae497af4b2d21dfb4a433ce5"
  },
  {
    "url": "img/pictos/Android/livresxxhdpi.png",
    "revision": "532629650a3a931de930d2ef6fbce555"
  },
  {
    "url": "img/pictos/Android/livresxxxhdpi.png",
    "revision": "3cb662616e78bf5659c73deed2887082"
  },
  {
    "url": "img/pictos/Android/song.svg",
    "revision": "e0872d2e384b44af48f8e40d29ed508b"
  },
  {
    "url": "img/pictos/Android/songhdpi.png",
    "revision": "c985d3ee7d48c8f3a7fa93fadca2ecc0"
  },
  {
    "url": "img/pictos/Android/songldpi.png",
    "revision": "8ce5ef7368319f4965fd81965d70f9bc"
  },
  {
    "url": "img/pictos/Android/songmdpi.png",
    "revision": "10f00b922ce8ff10392c8876f8a00e7c"
  },
  {
    "url": "img/pictos/Android/songxhdpi.png",
    "revision": "0268afd7fe85a79fba135d35b9a19aee"
  },
  {
    "url": "img/pictos/Android/songxxhdpi.png",
    "revision": "adb311cd5e451063f879ea74299d7d8e"
  },
  {
    "url": "img/pictos/Android/songxxxhdpi.png",
    "revision": "31975e48a39a79e2de5bd700b34a4f34"
  },
  {
    "url": "img/pictos/Android/tv.svg",
    "revision": "edd0b96218cee336abac799aacd091aa"
  },
  {
    "url": "img/pictos/Android/tvhdpi.png",
    "revision": "f3b063aa0b18f333c3fe41680f6064e1"
  },
  {
    "url": "img/pictos/Android/tvldpi.png",
    "revision": "2a4dca9f21ca05b67a3af56e8b749c43"
  },
  {
    "url": "img/pictos/Android/tvmdpi.png",
    "revision": "d58651a4fbad5cf2df3d6e060ddc2d53"
  },
  {
    "url": "img/pictos/Android/tvxhdpi.png",
    "revision": "3250b5c6e4364e50dba5c80468df60f6"
  },
  {
    "url": "img/pictos/Android/tvxxhdpi.png",
    "revision": "8a15b4fac0e42455fc1db2fb2f48efa5"
  },
  {
    "url": "img/pictos/Android/tvxxxhdpi.png",
    "revision": "ab3ae0fa788ddbc56d50ed62a8955e85"
  },
  {
    "url": "img/pictos/anime.png",
    "revision": "745711f35258292540b034778fbf0caa"
  },
  {
    "url": "img/pictos/art.png",
    "revision": "b0db66d5ba8efe6b423482be0b280986"
  },
  {
    "url": "img/pictos/cartes.png",
    "revision": "b13b88abaaed6d921088ee17d3566c05"
  },
  {
    "url": "img/pictos/comics.png",
    "revision": "179a3640d17f23b999bc2f898c501340"
  },
  {
    "url": "img/pictos/gaming.png",
    "revision": "c031f103611d0d38fa04c6ccd9295dc5"
  },
  {
    "url": "img/pictos/icones_menu/anime.svg",
    "revision": "297d2513ea609dd0b89b190affbc793e"
  },
  {
    "url": "img/pictos/icones_menu/art.svg",
    "revision": "a521fec8a905cdc3347efc9beab44f70"
  },
  {
    "url": "img/pictos/icones_menu/cartes.svg",
    "revision": "b5aca4fbef24e06a35fe050c22acdbab"
  },
  {
    "url": "img/pictos/icones_menu/comics.svg",
    "revision": "cb9694fe09a282fdb57391e6126c337b"
  },
  {
    "url": "img/pictos/icones_menu/dice-solid.svg",
    "revision": "501edd659341992f264274fc5fef328f"
  },
  {
    "url": "img/pictos/icones_menu/gaming.svg",
    "revision": "84daad91874e3651a6100d963721af97"
  },
  {
    "url": "img/pictos/icones_menu/livres.svg",
    "revision": "a261eefc1acc12deeec3197825a6bf6f"
  },
  {
    "url": "img/pictos/icones_menu/musique.svg",
    "revision": "5ca4aa33bf4b51ac36e40189f03ec960"
  },
  {
    "url": "img/pictos/icones_menu/tv.svg",
    "revision": "381b240b5a9240ea396aef80ff64e152"
  },
  {
    "url": "img/pictos/Ios/anime.png",
    "revision": "87527b3d0b9b87b560292eee7e60ae27"
  },
  {
    "url": "img/pictos/Ios/anime.svg",
    "revision": "b213eaf9823dcfbe228bae9c552f821c"
  },
  {
    "url": "img/pictos/Ios/anime@2x.png",
    "revision": "67cbb9806f045ae0862becdc918d6ee8"
  },
  {
    "url": "img/pictos/Ios/anime@3x.png",
    "revision": "b3ef6065cf0f7d5a2d9cd053b5406a97"
  },
  {
    "url": "img/pictos/Ios/art.png",
    "revision": "58c6d512734dc87fabbace338d4015e5"
  },
  {
    "url": "img/pictos/Ios/art.svg",
    "revision": "83ad0a198c96e4601de9e96a8e23d1e3"
  },
  {
    "url": "img/pictos/Ios/art@2x.png",
    "revision": "6bb05388f0274ce2269af263836da015"
  },
  {
    "url": "img/pictos/Ios/art@3x.png",
    "revision": "5cc49b0989c78fe0e6547aa8bcba4300"
  },
  {
    "url": "img/pictos/Ios/cartes.png",
    "revision": "74c1315c1181c5f3cc890ddff24325f6"
  },
  {
    "url": "img/pictos/Ios/cartes.svg",
    "revision": "457fb341b2c5db296276908ee329d1e0"
  },
  {
    "url": "img/pictos/Ios/cartes@2x.png",
    "revision": "6fc83a1769ec2d535847ed1904bf9faa"
  },
  {
    "url": "img/pictos/Ios/cartes@3x.png",
    "revision": "66cb84188276b261985f4c68a4eb5337"
  },
  {
    "url": "img/pictos/Ios/comics.png",
    "revision": "e674120ed0446ccb79ab7f808634cd31"
  },
  {
    "url": "img/pictos/Ios/comics.svg",
    "revision": "d0dedef15edf6154304ef6a7ec24d131"
  },
  {
    "url": "img/pictos/Ios/comics@2x.png",
    "revision": "d598e76215e8691e6d5f1ced12414ad7"
  },
  {
    "url": "img/pictos/Ios/comics@3x.png",
    "revision": "45e88ee868b548ed868b7f49374439a1"
  },
  {
    "url": "img/pictos/Ios/games.png",
    "revision": "8b4f76194e95582107db3132ccfdfec0"
  },
  {
    "url": "img/pictos/Ios/games.svg",
    "revision": "8dac56bfe36479fb0264cf71f15ac0b2"
  },
  {
    "url": "img/pictos/Ios/games@2x.png",
    "revision": "6b0cc6911a1192bf86e370539175ebf4"
  },
  {
    "url": "img/pictos/Ios/games@3x.png",
    "revision": "5f06ffce6d1818716dbd0e736c16e77d"
  },
  {
    "url": "img/pictos/Ios/livres.png",
    "revision": "9e13f680d69badf5fde8c0d70537b67f"
  },
  {
    "url": "img/pictos/Ios/livres.svg",
    "revision": "9d8588fd14ed9e5ceb6cf223575f97f2"
  },
  {
    "url": "img/pictos/Ios/livres@2x.png",
    "revision": "13e17781ae497af4b2d21dfb4a433ce5"
  },
  {
    "url": "img/pictos/Ios/livres@3x.png",
    "revision": "532629650a3a931de930d2ef6fbce555"
  },
  {
    "url": "img/pictos/Ios/song.png",
    "revision": "10f00b922ce8ff10392c8876f8a00e7c"
  },
  {
    "url": "img/pictos/Ios/song.svg",
    "revision": "e0872d2e384b44af48f8e40d29ed508b"
  },
  {
    "url": "img/pictos/Ios/song@2x.png",
    "revision": "0268afd7fe85a79fba135d35b9a19aee"
  },
  {
    "url": "img/pictos/Ios/song@3x.png",
    "revision": "adb311cd5e451063f879ea74299d7d8e"
  },
  {
    "url": "img/pictos/Ios/tv.png",
    "revision": "d58651a4fbad5cf2df3d6e060ddc2d53"
  },
  {
    "url": "img/pictos/Ios/tv.svg",
    "revision": "edd0b96218cee336abac799aacd091aa"
  },
  {
    "url": "img/pictos/Ios/tv@2x.png",
    "revision": "3250b5c6e4364e50dba5c80468df60f6"
  },
  {
    "url": "img/pictos/Ios/tv@3x.png",
    "revision": "8a15b4fac0e42455fc1db2fb2f48efa5"
  },
  {
    "url": "img/pictos/livres.png",
    "revision": "07de121fe9e4e59a7be365d876b20757"
  },
  {
    "url": "img/pictos/musique.png",
    "revision": "2d21ac7284eff457b45f084793e1f2ca"
  },
  {
    "url": "img/pictos/orig/anime.png",
    "revision": "cde9ebb9903901d97f779289d6d5e24b"
  },
  {
    "url": "img/pictos/orig/art.png",
    "revision": "ebb8a7260c7b2ec7dfc38ea236e30bfc"
  },
  {
    "url": "img/pictos/orig/cartes.png",
    "revision": "df9a8e48d59b9341280a32a47150c6b6"
  },
  {
    "url": "img/pictos/orig/comics.png",
    "revision": "c7fd502808b934bc74d0a76ff50fc7f2"
  },
  {
    "url": "img/pictos/orig/gaming.png",
    "revision": "181022a8e807f5ae5bff931a77cec52e"
  },
  {
    "url": "img/pictos/orig/livres.png",
    "revision": "d2d2b767474c89fc1ad9246eb2565f31"
  },
  {
    "url": "img/pictos/orig/musique.png",
    "revision": "7e752521cb9c083955b0b2ba7f0e627d"
  },
  {
    "url": "img/pictos/orig/TV.png",
    "revision": "9125bf3b5c3543312b8bb679a56434c8"
  },
  {
    "url": "img/pictos/pictos_normal/animehdpi.png",
    "revision": "f14b3983bbf097893eb8ef9610f7e10d"
  },
  {
    "url": "img/pictos/pictos_normal/arthdpi.png",
    "revision": "7e61e59c9e0736f21d71d426102e8d79"
  },
  {
    "url": "img/pictos/pictos_normal/carteshdpi.png",
    "revision": "81cc56d5ee1602b8c001adec50628cac"
  },
  {
    "url": "img/pictos/pictos_normal/comicshdpi.png",
    "revision": "d732d096571a1aa3903c291c81aceee8"
  },
  {
    "url": "img/pictos/pictos_normal/gameshdpi.png",
    "revision": "84885a19126bfa80ec7a7fbacf9c90c7"
  },
  {
    "url": "img/pictos/pictos_normal/livreshdpi.png",
    "revision": "4b0681265ebbd0311d15e891cad8c989"
  },
  {
    "url": "img/pictos/pictos_normal/songhdpi.png",
    "revision": "c985d3ee7d48c8f3a7fa93fadca2ecc0"
  },
  {
    "url": "img/pictos/pictos_normal/tvhdpi.png",
    "revision": "f3b063aa0b18f333c3fe41680f6064e1"
  },
  {
    "url": "img/pictos/svg/anime.svg",
    "revision": "b213eaf9823dcfbe228bae9c552f821c"
  },
  {
    "url": "img/pictos/svg/art.svg",
    "revision": "83ad0a198c96e4601de9e96a8e23d1e3"
  },
  {
    "url": "img/pictos/svg/cartes.svg",
    "revision": "457fb341b2c5db296276908ee329d1e0"
  },
  {
    "url": "img/pictos/svg/comics.svg",
    "revision": "d0dedef15edf6154304ef6a7ec24d131"
  },
  {
    "url": "img/pictos/svg/games.svg",
    "revision": "8dac56bfe36479fb0264cf71f15ac0b2"
  },
  {
    "url": "img/pictos/svg/livres.svg",
    "revision": "9d8588fd14ed9e5ceb6cf223575f97f2"
  },
  {
    "url": "img/pictos/svg/song.svg",
    "revision": "e0872d2e384b44af48f8e40d29ed508b"
  },
  {
    "url": "img/pictos/svg/tv.svg",
    "revision": "edd0b96218cee336abac799aacd091aa"
  },
  {
    "url": "img/pictos/TV.png",
    "revision": "0b2169ca23ba140063e5eb1cad8d2db3"
  },
  {
    "url": "img/rating/muf_full.png",
    "revision": "a30772dea431859acd088152c150055d"
  },
  {
    "url": "img/rating/muf_half.png",
    "revision": "8654cb1bdbc9370e79ccdda1d8d194ce"
  },
  {
    "url": "js/bulma.js",
    "revision": "84fc68fea62cc695dbda39646fbb4971"
  },
  {
    "url": "js/dropzone.js",
    "revision": "f17d67d3cd4278ab224a0178111c511e"
  },
  {
    "url": "js/konami.js",
    "revision": "0947c8b7afbba74fef1159097b7522a7"
  },
  {
    "url": "js/lightbox/lightbox-plus-jquery.js",
    "revision": "3e50563474c1bb78f0c422cd868077ed"
  },
  {
    "url": "js/lightbox/lightbox.js",
    "revision": "ec01bec1ed16bf4c15d39a2697765864"
  },
  {
    "url": "js/load_content.js",
    "revision": "7c546f173a4f462a3c3e34d008fe208e"
  },
  {
    "url": "js/modals.js",
    "revision": "16194b8b5a233b0bf2ce4f154d8eb6a3"
  },
  {
    "url": "js/nouislider.min.js",
    "revision": "a8235ed6e351cf319645fc4815ff94b4"
  },
  {
    "url": "js/old_app.js",
    "revision": "a96f39dc69c4123ceb09bf4f44def2ee"
  },
  {
    "url": "js/tarteaucitron/advertising.js",
    "revision": "03b906458d104b03623e05f8b82be15f"
  },
  {
    "url": "js/tarteaucitron/css/tarteaucitron.css",
    "revision": "04a4ef5bd1ef17c029b904744909d09d"
  },
  {
    "url": "js/tarteaucitron/lang/tarteaucitron.cs.js",
    "revision": "8221c2b03c667c4029bdde6d7bd95f74"
  },
  {
    "url": "js/tarteaucitron/lang/tarteaucitron.de.js",
    "revision": "a86c22e00f14d7dff665a59901026e0b"
  },
  {
    "url": "js/tarteaucitron/lang/tarteaucitron.en.js",
    "revision": "e98990170c8ed0fb0a0159a1e51f71c8"
  },
  {
    "url": "js/tarteaucitron/lang/tarteaucitron.es.js",
    "revision": "a77233df76f8fe18de68c035f6f6d4c8"
  },
  {
    "url": "js/tarteaucitron/lang/tarteaucitron.fr.js",
    "revision": "cd59ce3568dc242b44af77812c1e772b"
  },
  {
    "url": "js/tarteaucitron/lang/tarteaucitron.it.js",
    "revision": "0c12c2f841f6fc28a4baa02ada227d63"
  },
  {
    "url": "js/tarteaucitron/lang/tarteaucitron.pl.js",
    "revision": "ae5cb16f5339822368b001c0bc021b03"
  },
  {
    "url": "js/tarteaucitron/lang/tarteaucitron.pt.js",
    "revision": "831c308c04feac5e6091dac1e24e0d08"
  },
  {
    "url": "js/tarteaucitron/lang/tarteaucitron.ru.js",
    "revision": "3ca763352db2b4943c9eecdef536e9b6"
  },
  {
    "url": "js/tarteaucitron/tarteaucitron.js",
    "revision": "87792574f76acb8e8db9f70cde865f6d"
  },
  {
    "url": "js/tarteaucitron/tarteaucitron.services.js",
    "revision": "d5088ad1d49e30c1a9f12ae58e66a1df"
  },
  {
    "url": "js/tinymce/Gruntfile.js",
    "revision": "6b0643f1a007ba343b3de4fbdf999307"
  },
  {
    "url": "js/tinymce/js/jquery.tinymce.min.js",
    "revision": "9a60dbfe8bb13bb3611f82b1120fd9b7"
  },
  {
    "url": "js/tinymce/js/plugins/advlist/plugin.js",
    "revision": "ed91399151bafe085592319416a7aa27"
  },
  {
    "url": "js/tinymce/js/plugins/advlist/plugin.min.js",
    "revision": "48f1c6fe0e9412a028fb82a98db93fd1"
  },
  {
    "url": "js/tinymce/js/plugins/anchor/plugin.js",
    "revision": "5bca1b19b6db63da508c3127d52c76c9"
  },
  {
    "url": "js/tinymce/js/plugins/anchor/plugin.min.js",
    "revision": "fc850749898500176bc08a38e78af1d7"
  },
  {
    "url": "js/tinymce/js/plugins/autolink/plugin.js",
    "revision": "7ac7e36dc5e63b688dd77cb352d1f122"
  },
  {
    "url": "js/tinymce/js/plugins/autolink/plugin.min.js",
    "revision": "3adeffae708915ae5fca17c1afb4f84d"
  },
  {
    "url": "js/tinymce/js/plugins/autoresize/plugin.js",
    "revision": "f5a70c73e6dd9567c0ebcd2fd9845d50"
  },
  {
    "url": "js/tinymce/js/plugins/autoresize/plugin.min.js",
    "revision": "c1239f5cbd1e495e2c3dea1a764354eb"
  },
  {
    "url": "js/tinymce/js/plugins/autosave/plugin.js",
    "revision": "1336faefe5b7dae40a188b2c8b99b1a3"
  },
  {
    "url": "js/tinymce/js/plugins/autosave/plugin.min.js",
    "revision": "1e943d19b47aacecd2dbba221bdc6330"
  },
  {
    "url": "js/tinymce/js/plugins/bbcode/plugin.js",
    "revision": "830734505d8f7ac7dbc3276774f8aaf2"
  },
  {
    "url": "js/tinymce/js/plugins/bbcode/plugin.min.js",
    "revision": "4cf197120919e120d827f25915641ed6"
  },
  {
    "url": "js/tinymce/js/plugins/charmap/plugin.js",
    "revision": "c861b453818139863a04080fa0910e3d"
  },
  {
    "url": "js/tinymce/js/plugins/charmap/plugin.min.js",
    "revision": "77d15216eff036c0ef50b8066e0479c7"
  },
  {
    "url": "js/tinymce/js/plugins/code/plugin.js",
    "revision": "4770cc7eb2f140a1ebd5bce4b68992da"
  },
  {
    "url": "js/tinymce/js/plugins/code/plugin.min.js",
    "revision": "a46870baf56108c91a20e11ac67d590f"
  },
  {
    "url": "js/tinymce/js/plugins/codesample/plugin.js",
    "revision": "1e9b8aefa83290c12ccde780578c6915"
  },
  {
    "url": "js/tinymce/js/plugins/codesample/plugin.min.js",
    "revision": "d7ba4e2cd938229e1fe7df554284641d"
  },
  {
    "url": "js/tinymce/js/plugins/colorpicker/plugin.js",
    "revision": "0d3f8dfd00a399b58f33a4a3dd63ea96"
  },
  {
    "url": "js/tinymce/js/plugins/colorpicker/plugin.min.js",
    "revision": "01eec7b715f776a7fd96bdf91b398fac"
  },
  {
    "url": "js/tinymce/js/plugins/contextmenu/plugin.js",
    "revision": "1e7e9cca3c51297e2dbed1a877ee420d"
  },
  {
    "url": "js/tinymce/js/plugins/contextmenu/plugin.min.js",
    "revision": "195a58263f2cbe4f91d139284869dd6f"
  },
  {
    "url": "js/tinymce/js/plugins/directionality/plugin.js",
    "revision": "799231f9cc17893ee02250356b07d9c8"
  },
  {
    "url": "js/tinymce/js/plugins/directionality/plugin.min.js",
    "revision": "38b78aefe1080557a78b1144cef90842"
  },
  {
    "url": "js/tinymce/js/plugins/emoticons/js/emojis.js",
    "revision": "58f90368b44d4ee7883b4251956e50c4"
  },
  {
    "url": "js/tinymce/js/plugins/emoticons/js/emojis.min.js",
    "revision": "f817bf9fd579c32ed9089abfd4aefdd9"
  },
  {
    "url": "js/tinymce/js/plugins/emoticons/plugin.js",
    "revision": "746e04101efdd82f01a0444519b57fe9"
  },
  {
    "url": "js/tinymce/js/plugins/emoticons/plugin.min.js",
    "revision": "5f72d2c015903264b45630f7b3a97c93"
  },
  {
    "url": "js/tinymce/js/plugins/fullpage/plugin.js",
    "revision": "7fa8158efc811de422e0cac4c21926dc"
  },
  {
    "url": "js/tinymce/js/plugins/fullpage/plugin.min.js",
    "revision": "4ce895249209d1c3b1cafd4a2c1eee96"
  },
  {
    "url": "js/tinymce/js/plugins/fullscreen/plugin.js",
    "revision": "5b3e9feffb95022b2cffdb88f49139d4"
  },
  {
    "url": "js/tinymce/js/plugins/fullscreen/plugin.min.js",
    "revision": "3b2e39b7f106a37ebb96c802951d91c1"
  },
  {
    "url": "js/tinymce/js/plugins/help/plugin.js",
    "revision": "520f39150c74859c66f52acd6b7b2d14"
  },
  {
    "url": "js/tinymce/js/plugins/help/plugin.min.js",
    "revision": "dc1f8531c3894ff05d520584530a42ae"
  },
  {
    "url": "js/tinymce/js/plugins/hr/plugin.js",
    "revision": "653aa79807908a15cd1cb9b6929af9fd"
  },
  {
    "url": "js/tinymce/js/plugins/hr/plugin.min.js",
    "revision": "09dc982c9178f065a675c82207247039"
  },
  {
    "url": "js/tinymce/js/plugins/image/plugin.js",
    "revision": "46a57e89796a0d1f2d064f54034ffe15"
  },
  {
    "url": "js/tinymce/js/plugins/image/plugin.min.js",
    "revision": "026d615ae6e884378d0e13e85d41739f"
  },
  {
    "url": "js/tinymce/js/plugins/imagetools/plugin.js",
    "revision": "7f697a41b7312b3757bc2fadff19983e"
  },
  {
    "url": "js/tinymce/js/plugins/imagetools/plugin.min.js",
    "revision": "1f73dff251edb225e27e238a5a7bddc2"
  },
  {
    "url": "js/tinymce/js/plugins/importcss/plugin.js",
    "revision": "c09e05694ca16a0c988dd41898a1c5a1"
  },
  {
    "url": "js/tinymce/js/plugins/importcss/plugin.min.js",
    "revision": "a4288b042857c1d8cd93b2c17b3e1ba6"
  },
  {
    "url": "js/tinymce/js/plugins/insertdatetime/plugin.js",
    "revision": "6bf2ce87dc3e4982ad89ee762131c0d6"
  },
  {
    "url": "js/tinymce/js/plugins/insertdatetime/plugin.min.js",
    "revision": "b6b788a9fa238c8e925f6206581ec51c"
  },
  {
    "url": "js/tinymce/js/plugins/legacyoutput/plugin.js",
    "revision": "cc0a5c21bb28639cc09da1d346f8857b"
  },
  {
    "url": "js/tinymce/js/plugins/legacyoutput/plugin.min.js",
    "revision": "18b37d6b59a613b8b151c6fdb0168aae"
  },
  {
    "url": "js/tinymce/js/plugins/link/plugin.js",
    "revision": "3a21089d00b1f02a1d2aac48046382d6"
  },
  {
    "url": "js/tinymce/js/plugins/link/plugin.min.js",
    "revision": "2afb3ed305676329dc28c847880c714a"
  },
  {
    "url": "js/tinymce/js/plugins/lists/plugin.js",
    "revision": "6088e270fa77080befb9b5c82a50c5c8"
  },
  {
    "url": "js/tinymce/js/plugins/lists/plugin.min.js",
    "revision": "2c96bd42d9060e2227481ac8f2f28596"
  },
  {
    "url": "js/tinymce/js/plugins/media/plugin.js",
    "revision": "c694943793b3c232449c9bb1e75a7403"
  },
  {
    "url": "js/tinymce/js/plugins/media/plugin.min.js",
    "revision": "e78c7a2d16c84569b92270a0e287ad4c"
  },
  {
    "url": "js/tinymce/js/plugins/nonbreaking/plugin.js",
    "revision": "a7619262fc8fb76ff39b21d1485fd74f"
  },
  {
    "url": "js/tinymce/js/plugins/nonbreaking/plugin.min.js",
    "revision": "b434b92139845257c0989b35c59d99a4"
  },
  {
    "url": "js/tinymce/js/plugins/noneditable/plugin.js",
    "revision": "326dcf41b3b33030d1d362eba64ad076"
  },
  {
    "url": "js/tinymce/js/plugins/noneditable/plugin.min.js",
    "revision": "0ba45899472a89fa8f0f90b91727709b"
  },
  {
    "url": "js/tinymce/js/plugins/pagebreak/plugin.js",
    "revision": "ccf4c639ecc79d5868b310755eef685d"
  },
  {
    "url": "js/tinymce/js/plugins/pagebreak/plugin.min.js",
    "revision": "e50203303a14f9c816e09f3be9c83939"
  },
  {
    "url": "js/tinymce/js/plugins/paste/plugin.js",
    "revision": "1f8b11b66159509b51a14878362ebbeb"
  },
  {
    "url": "js/tinymce/js/plugins/paste/plugin.min.js",
    "revision": "921a49b93310417bca691b59d18defa8"
  },
  {
    "url": "js/tinymce/js/plugins/preview/plugin.js",
    "revision": "49869d34c884c07812b9796fa83d93fe"
  },
  {
    "url": "js/tinymce/js/plugins/preview/plugin.min.js",
    "revision": "9ab871f8ce85f93208e72538698e7b1b"
  },
  {
    "url": "js/tinymce/js/plugins/print/plugin.js",
    "revision": "758bf4ac63bf71001be8ce3f91cee487"
  },
  {
    "url": "js/tinymce/js/plugins/print/plugin.min.js",
    "revision": "dc284ef7311c3b3090dfaf97608a16d4"
  },
  {
    "url": "js/tinymce/js/plugins/quickbars/plugin.js",
    "revision": "13525319dcc94ec04ac75e08bb3da868"
  },
  {
    "url": "js/tinymce/js/plugins/quickbars/plugin.min.js",
    "revision": "777a0d3d22d09e3028843b43eaf646f0"
  },
  {
    "url": "js/tinymce/js/plugins/save/plugin.js",
    "revision": "d66cef39a995ab2ef0066c37cec26f6e"
  },
  {
    "url": "js/tinymce/js/plugins/save/plugin.min.js",
    "revision": "75118ae4bb38815e2b86b7ec2f79b525"
  },
  {
    "url": "js/tinymce/js/plugins/searchreplace/plugin.js",
    "revision": "f1353abece77af0e610d169b9d87a3b0"
  },
  {
    "url": "js/tinymce/js/plugins/searchreplace/plugin.min.js",
    "revision": "7a98cadc7ffc1e3919a0bc0981841f2d"
  },
  {
    "url": "js/tinymce/js/plugins/spellchecker/plugin.js",
    "revision": "89047cd87136d6416b24d1241dff4992"
  },
  {
    "url": "js/tinymce/js/plugins/spellchecker/plugin.min.js",
    "revision": "4158c95115de894db58be475708c2c49"
  },
  {
    "url": "js/tinymce/js/plugins/tabfocus/plugin.js",
    "revision": "c6f58718992eea8c2d40b6220ab9e21d"
  },
  {
    "url": "js/tinymce/js/plugins/tabfocus/plugin.min.js",
    "revision": "2f66bf40f82a4ef12f9d2d59a1bc73ca"
  },
  {
    "url": "js/tinymce/js/plugins/table/plugin.js",
    "revision": "501d0271834eac8cb8fa238508eaa949"
  },
  {
    "url": "js/tinymce/js/plugins/table/plugin.min.js",
    "revision": "19909ad801285f1c0a98313237b0121e"
  },
  {
    "url": "js/tinymce/js/plugins/template/plugin.js",
    "revision": "9b44ac67b60b0225c6c9069d73acb9e1"
  },
  {
    "url": "js/tinymce/js/plugins/template/plugin.min.js",
    "revision": "fd828a3488f9e0f3e2f7b7c9c01b97ed"
  },
  {
    "url": "js/tinymce/js/plugins/textcolor/plugin.js",
    "revision": "d4157c81c324a7a95f88443f09167b40"
  },
  {
    "url": "js/tinymce/js/plugins/textcolor/plugin.min.js",
    "revision": "44c89c76b3b49e621a9d287826341b2d"
  },
  {
    "url": "js/tinymce/js/plugins/textpattern/plugin.js",
    "revision": "d8f473c59b0d7a1c5a60bc37ae7e342f"
  },
  {
    "url": "js/tinymce/js/plugins/textpattern/plugin.min.js",
    "revision": "9c8be8c93b3b66fc1ba4ec5b9b17fe0b"
  },
  {
    "url": "js/tinymce/js/plugins/toc/plugin.js",
    "revision": "f5c980f5e953ece85bdf88facb463509"
  },
  {
    "url": "js/tinymce/js/plugins/toc/plugin.min.js",
    "revision": "00d51db2f9dba7eb4eeb57f4671b9931"
  },
  {
    "url": "js/tinymce/js/plugins/visualblocks/plugin.js",
    "revision": "efd5f7556af5ac5dd3cce214dd5328ea"
  },
  {
    "url": "js/tinymce/js/plugins/visualblocks/plugin.min.js",
    "revision": "8a213d525b0d0d9daa79e82ffe0dfbf5"
  },
  {
    "url": "js/tinymce/js/plugins/visualchars/plugin.js",
    "revision": "28eddb9780f62b69c8736e8c445989ee"
  },
  {
    "url": "js/tinymce/js/plugins/visualchars/plugin.min.js",
    "revision": "a206a90ad5ca2e6f0d4fd4463f9b08d7"
  },
  {
    "url": "js/tinymce/js/plugins/wordcount/plugin.js",
    "revision": "4a4435d2b3133f838f6fbad8426ae048"
  },
  {
    "url": "js/tinymce/js/plugins/wordcount/plugin.min.js",
    "revision": "0cef273f9a3b6ce56f4035109bf7e21e"
  },
  {
    "url": "js/tinymce/js/skins/content/default/content.css",
    "revision": "fc68e33355e39e9c12d58b153bfac528"
  },
  {
    "url": "js/tinymce/js/skins/content/default/content.min.css",
    "revision": "54821f943ba78f6ac96bb9c708fa8f8d"
  },
  {
    "url": "js/tinymce/js/skins/content/document/content.css",
    "revision": "85d878bde8474c794a5d45d1adf7ac51"
  },
  {
    "url": "js/tinymce/js/skins/content/document/content.min.css",
    "revision": "a2caa9e6a908cc7170f0114fa376f487"
  },
  {
    "url": "js/tinymce/js/skins/content/writer/content.css",
    "revision": "96da2f2e46fe89e7f28385401eb05670"
  },
  {
    "url": "js/tinymce/js/skins/content/writer/content.min.css",
    "revision": "9ee10da26ad8ee37cf778f80334e856f"
  },
  {
    "url": "js/tinymce/js/skins/ui/oxide-dark/content.inline.min.css",
    "revision": "65742518a050d55e773fa63cdc8a06bf"
  },
  {
    "url": "js/tinymce/js/skins/ui/oxide-dark/content.min.css",
    "revision": "454d140f65667a6236fda81c59e2f5b5"
  },
  {
    "url": "js/tinymce/js/skins/ui/oxide-dark/skin.min.css",
    "revision": "7a1ac597a9631c3d0e937c8065ac572f"
  },
  {
    "url": "js/tinymce/js/skins/ui/oxide/content.inline.min.css",
    "revision": "65742518a050d55e773fa63cdc8a06bf"
  },
  {
    "url": "js/tinymce/js/skins/ui/oxide/content.min.css",
    "revision": "454d140f65667a6236fda81c59e2f5b5"
  },
  {
    "url": "js/tinymce/js/skins/ui/oxide/content.mobile.min.css",
    "revision": "0684a64086ad1114949a1e51f06aa750"
  },
  {
    "url": "js/tinymce/js/skins/ui/oxide/skin.min.css",
    "revision": "052662d33c335d19d201525159601559"
  },
  {
    "url": "js/tinymce/js/skins/ui/oxide/skin.mobile.min.css",
    "revision": "68c98b47be8f450de7bb0749e66ea0e1"
  },
  {
    "url": "js/tinymce/js/themes/mobile/theme.js",
    "revision": "f310f577d413beb221dde66803ac262c"
  },
  {
    "url": "js/tinymce/js/themes/mobile/theme.min.js",
    "revision": "9fed898f0d70a22117dedecfa5d6bf93"
  },
  {
    "url": "js/tinymce/js/themes/silver/theme.js",
    "revision": "1609503e7092768a2341df3cb398d89a"
  },
  {
    "url": "js/tinymce/js/themes/silver/theme.min.js",
    "revision": "04f0bd8735bfa93daee47a29f3a5d6cd"
  },
  {
    "url": "js/tinymce/js/tinymce.js",
    "revision": "5edff1b184ce08a6c5be0f03ee017c9b"
  },
  {
    "url": "js/tinymce/js/tinymce.min.js",
    "revision": "d1e7d67d9b2b968e00c91517e6f6a7da"
  },
  {
    "url": "js/tinymce/package.json",
    "revision": "cfaba4e135ce17fe4f10e7a354c0eeea"
  },
  {
    "url": "js/tinymce/tools/docs/tinymce.CommandEvent.js",
    "revision": "09b319ca09cd3add0f3c5faf8e20c125"
  },
  {
    "url": "js/tinymce/tools/docs/tinymce.ContentEvent.js",
    "revision": "d7aacb51b61acdfc159d022fb36a10e7"
  },
  {
    "url": "js/tinymce/tools/docs/tinymce.Editor.js",
    "revision": "7db8a07ecf178968e48172ca0d7bcaf0"
  },
  {
    "url": "js/tinymce/tools/docs/tinymce.Event.js",
    "revision": "fedf74b1a1361fafd0d2a5a47e871a5f"
  },
  {
    "url": "js/tinymce/tools/docs/tinymce.FocusEvent.js",
    "revision": "1097061c932193bed1be3cb95c17e2cd"
  },
  {
    "url": "js/tinymce/tools/docs/tinymce.js",
    "revision": "5701c3bf19b987826dd823872f664fbf"
  },
  {
    "url": "js/tinymce/tools/docs/tinymce.ProgressStateEvent.js",
    "revision": "f41784d3cd7e1f324008daeb48837f76"
  },
  {
    "url": "js/tinymce/tools/docs/tinymce.ResizeEvent.js",
    "revision": "944582c071e7eaba67002bdbf569c6b9"
  },
  {
    "url": "js/tinymce/tools/modules/grunt-utils.js",
    "revision": "a839a8ea51ffe48f2abad84bc0d9381e"
  },
  {
    "url": "js/tinymce/tools/modules/grunt-webpack.js",
    "revision": "181feeb5ad1e376db2d2b99ba8edea55"
  },
  {
    "url": "js/tinymce/tools/modules/zip-helper.js",
    "revision": "f5a12d67fca23536d51133af18b38c14"
  },
  {
    "url": "js/tinymce/tools/tasks/bundle.js",
    "revision": "0048ae4d7d0c23cffe9070cd661b5eea"
  },
  {
    "url": "js/tinymce/tools/tasks/globals.js",
    "revision": "d29e5c97b49c3f58ab4678c74f6cadf2"
  },
  {
    "url": "js/tinymce/tools/tasks/moxiezip.js",
    "revision": "411434752dc27f661ef6a66de5025861"
  },
  {
    "url": "js/tinymce/tools/tasks/validateVersion.js",
    "revision": "8f8236b51b1f49050ae3eb465246e75b"
  },
  {
    "url": "js/tinymce/tsconfig.json",
    "revision": "667c950b4b7d87e3da36d9ba3fd32f1c"
  },
  {
    "url": "js/tinymce/tsconfig.plugin.json",
    "revision": "0d8146c677605bf2eae6b78d41ea7562"
  },
  {
    "url": "js/tinymce/tsconfig.theme.json",
    "revision": "0d8146c677605bf2eae6b78d41ea7562"
  },
  {
    "url": "js/tinymce/tslint.json",
    "revision": "35ff2999a7492823c81a8847f7157276"
  },
  {
    "url": "js/toasty/bower.json",
    "revision": "104b7959bd0d1fc5c9ef2a772b4583d1"
  },
  {
    "url": "js/toasty/jquery.toasty.js",
    "revision": "7d48f37ae275ab09b63bee5d22dc4444"
  },
  {
    "url": "js/toasty/toasty.css",
    "revision": "ae32b4b4ed6924270cdf654bf9f21672"
  },
  {
    "url": "js/toasty/toasty.jquery.json",
    "revision": "e321658d3b0fd47d8db48665cde7eb40"
  },
  {
    "url": "js/toasty/toasty.png",
    "revision": "7ef4abf276234cbf846af3f8ef67e99e"
  },
  {
    "url": "main.js",
    "revision": "c7f9000a47f40a7bb52ae08186cc10f6"
  },
  {
    "url": "mix-manifest.json",
    "revision": "e67ff94db9e533a7ff33613907dcb861"
  },
  {
    "url": "mstile-150x150.png",
    "revision": "88d8ad4eb07b15d6fc787e66dfbbfa21"
  },
  {
    "url": "opensearch.xml",
    "revision": "1bbbed75c7977a4a3fe264a4f7c8efd9"
  },
  {
    "url": "safari-pinned-tab.svg",
    "revision": "cd79f0fe656c458d7c15e3e146f469f7"
  },
  {
    "url": "sitemap.xml",
    "revision": "994dc9bdbd4bf3fcb1d0aa46227422be"
  },
  {
    "url": "storage/1/119-400x400.jpg",
    "revision": "339f2677b789f16f150b2d305e9f92bb"
  },
  {
    "url": "storage/1/180-400x400.jpg",
    "revision": "9203715313b2efcb060e7bd2583c7c0f"
  },
  {
    "url": "storage/1/conversions/119-400x400-index.png",
    "revision": "66c566658e28a8ea02e3f2a020959160"
  },
  {
    "url": "storage/1/conversions/119-400x400-thumb.jpg",
    "revision": "822075e8b335d613269bb0d88ffb3cc4"
  },
  {
    "url": "storage/1/responsive-images/119-400x400___medialibrary_original_400_400.jpg",
    "revision": "45e6a9c124704b430b49943fc0420ea6"
  },
  {
    "url": "storage/2/658-400x400.jpg",
    "revision": "35b2ea06a7b130b5b9714dfe178002a1"
  },
  {
    "url": "storage/2/conversions/tv-index.png",
    "revision": "e2d50f94696cbc75b33ea102e18d2bf0"
  },
  {
    "url": "storage/2/conversions/tv-thumb.jpg",
    "revision": "316fa093326d5e4c9c869bf7fba5ffc3"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_1124_632.png",
    "revision": "c5179f97787258527c8987b8ee5e772d"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_1344_756.png",
    "revision": "0c254abe388f265b4f0e2364ec2d5c9b"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_1606_903.png",
    "revision": "e27b800116230f76fdaa2fa466e2ab1f"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_1920_1080.png",
    "revision": "94fa4f8697b00c8637fdb84641ef3a5d"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_225_126.png",
    "revision": "a6214e5dc5cb65c9e01371369e9f3f77"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_269_151.png",
    "revision": "ef5a157c140b7aeb8a4dd086fa2580fc"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_322_181.png",
    "revision": "eac070e9405e2c36338b6c222b2508bb"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_385_216.png",
    "revision": "c41a6f76cb6740cae1aab4bb1a37d6af"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_460_258.png",
    "revision": "fef87175ffdfae983685a41b37bcab71"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_550_309.png",
    "revision": "60805e0a1fd837a2394136a09f056c23"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_658_370.png",
    "revision": "fd78e89eb7fc5edd2c0a6d65724bfbc5"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_787_442.png",
    "revision": "092aa07686d9d93e9723259aa083f032"
  },
  {
    "url": "storage/2/responsive-images/tv___medialibrary_original_940_528.png",
    "revision": "d457286866bc2a4bc1a8bbbf2e7f4f72"
  },
  {
    "url": "storage/2/tv.png",
    "revision": "f51b5b4eedc029cdd2465dae1c4b1a88"
  },
  {
    "url": "storage/3/228-400x400.jpg",
    "revision": "64478ec575e606e8b6fe8edd1ebd8770"
  },
  {
    "url": "storage/3/conversions/228-400x400-index.png",
    "revision": "95a968c790c499522b42580399601508"
  },
  {
    "url": "storage/3/conversions/228-400x400-thumb.jpg",
    "revision": "c02f9121a611bb5d3404235366c090b1"
  },
  {
    "url": "storage/3/conversions/manga-index.png",
    "revision": "19e6a6184177ca7bd5770a52870e2240"
  },
  {
    "url": "storage/3/conversions/manga-thumb.jpg",
    "revision": "620345b8b62bc3ed8af66244ec1f5600"
  },
  {
    "url": "storage/3/manga.png",
    "revision": "22d2cf5f1f9137703b3ce5b7b918a274"
  },
  {
    "url": "storage/3/responsive-images/228-400x400___index_104_104.jpg",
    "revision": "ce8cce9e93ac4e515d14e4bfc85dd7a1"
  },
  {
    "url": "storage/3/responsive-images/228-400x400___index_125_125.jpg",
    "revision": "64a5aa42f88c2d961efac2e73a3916fb"
  },
  {
    "url": "storage/3/responsive-images/228-400x400___index_150_150.jpg",
    "revision": "c02f9121a611bb5d3404235366c090b1"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_1124_632.png",
    "revision": "044439f45c66397d1ca1ae84c2f552f3"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_1344_756.png",
    "revision": "fcc0ef9973174e9e1d861b634e7c6f7b"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_1606_903.png",
    "revision": "854f6bbb433f1a9512d29400af9d82de"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_1920_1080.png",
    "revision": "bf6c39f8cda03ffe94191776fd754f46"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_322_181.png",
    "revision": "20aa41917e7dd53c789f3f0aaee2576d"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_385_216.png",
    "revision": "d49b203bbe864ad6febd0f8db0cf74a5"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_460_258.png",
    "revision": "f940df894ed62c548e228b79c7e33d42"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_550_309.png",
    "revision": "b45e93ae2dca80e489ac8dba31fd7bbc"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_658_370.png",
    "revision": "9614f4921d31f2928bbb73c57f1ff59c"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_787_442.png",
    "revision": "e865b1d1230cc311377a8ec3d99a1645"
  },
  {
    "url": "storage/3/responsive-images/manga___medialibrary_original_940_528.png",
    "revision": "04889a9da5f2be28f0a0452a7143a7c2"
  },
  {
    "url": "storage/4/180-400x400.jpg",
    "revision": "9203715313b2efcb060e7bd2583c7c0f"
  },
  {
    "url": "storage/4/conversions/180-400x400-index.png",
    "revision": "fcec74225bb3a910973c50f62641cea7"
  },
  {
    "url": "storage/4/conversions/180-400x400-thumb.jpg",
    "revision": "731d85493f49a32a4edc06736e9d65d4"
  },
  {
    "url": "storage/4/responsive-images/180-400x400___medialibrary_original_280_280.jpg",
    "revision": "59516147ba73bd93e736ff5ca3ee8774"
  },
  {
    "url": "storage/4/responsive-images/180-400x400___medialibrary_original_334_334.jpg",
    "revision": "b6d2b6434ddd6739faae1904d5205614"
  },
  {
    "url": "storage/4/responsive-images/180-400x400___medialibrary_original_400_400.jpg",
    "revision": "36cf40f3c324212308ec302d636dd146"
  },
  {
    "url": "univers/18/2/index_KUqjFveT2s.png",
    "revision": "efd201b9c06db213ed59561a9d636c6c"
  },
  {
    "url": "univers/18/index_KUqjFveT2s.png",
    "revision": "efd201b9c06db213ed59561a9d636c6c"
  },
  {
    "url": "user/2/1544911012.png",
    "revision": "ed3221c65234911ddb4abe7cf82b7eb5"
  },
  {
    "url": "user/2/1544913557.png",
    "revision": "a5dce29e091a47c1e277090c7b6d00a1"
  },
  {
    "url": "user/2/1544914001.jpg",
    "revision": "070734ba546c1c4a728d47210178b0d9"
  },
  {
    "url": "user/2/1544914044.jpg",
    "revision": "658456aa69fb6108d23a631b72169d8c"
  },
  {
    "url": "user/2/1544914732.png",
    "revision": "894949afe5d4cbbb7a353ce85f759623"
  },
  {
    "url": "user/2/1544915209.jpg",
    "revision": "658456aa69fb6108d23a631b72169d8c"
  },
  {
    "url": "vendor/horizon/app-dark.css",
    "revision": "b5b064c2f5a4b673a1c59d70a8589073"
  },
  {
    "url": "vendor/horizon/app.css",
    "revision": "b95d548aba488172f4b43083c524a511"
  },
  {
    "url": "vendor/horizon/app.js",
    "revision": "2f0b62afeb80a5d1877fe00e015f9699"
  },
  {
    "url": "vendor/horizon/css/app.css",
    "revision": "c7ed9301f1d8740d3073a30e090807f6"
  },
  {
    "url": "vendor/horizon/img/favicon.png",
    "revision": "1d3160a1e66b651d38662af632f23e58"
  },
  {
    "url": "vendor/horizon/img/horizon.svg",
    "revision": "904d5b5185fefb09035384e15bfca765"
  },
  {
    "url": "vendor/horizon/img/sprite.svg",
    "revision": "afc4952b74895bdef3ab4ebe9adb746f"
  },
  {
    "url": "vendor/horizon/js/app.js",
    "revision": "5bd5c82ff546bec19c3f68f19b13c357"
  },
  {
    "url": "vendor/horizon/mix-manifest.json",
    "revision": "0bb35e6a5cdcfe69d083c7bdb4676047"
  },
  {
    "url": "vendor/tcg/voyager/assets/css/app.css",
    "revision": "60cae7f1f3dd18a6f6c071677f763ea3"
  },
  {
    "url": "vendor/tcg/voyager/assets/css/rtl.css",
    "revision": "7bc163c0b81ce6a3718a8553fc6fab23"
  },
  {
    "url": "vendor/tcg/voyager/assets/fonts/bootstrap/glyphicons-halflings-regular.svg",
    "revision": "89889688147bd7575d6327160d64e760"
  },
  {
    "url": "vendor/tcg/voyager/assets/fonts/voyager.svg",
    "revision": "69a9afda98f8192afa876b4949b575c8"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/bg.jpg",
    "revision": "ed5ea9c51f7e65641c60b7ce3aa86c5f"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/captain-avatar.png",
    "revision": "826c7e3363c1442fe0d572b8a96b6544"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/compass/documentation.jpg",
    "revision": "a0be64fdca03fa2559d16268f762e85b"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/compass/hooks.jpg",
    "revision": "2e57e84f5d9c4efa8241414179d075b5"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/compass/voyager-home.jpg",
    "revision": "6a2dd2f8df6c2f15f1f39705506899ac"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/helm.svg",
    "revision": "ef1556be6e63a5ee2fdbc802e6265c07"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/large-logo-icon-light.png",
    "revision": "0fe2f4f684706b644f4695d2d5d35f35"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/large-logo-icon.png",
    "revision": "8c141fe526139b26d9b662dc9720c74f"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/logo-icon-light.png",
    "revision": "ea16d6c6b3cf794ae0616e51cf017ac2"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/logo-icon.png",
    "revision": "33897f3bd0239be111e7237291b746d6"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/voyager-character.png",
    "revision": "2c55fd8e88f415a8c5efce1e81a2aa4c"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/widget-backgrounds/01.jpg",
    "revision": "fb1fd8580b547fa5cf0e06a8db3840ac"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/widget-backgrounds/02.jpg",
    "revision": "214021f9a4f34ce976ac8f84b8efe4db"
  },
  {
    "url": "vendor/tcg/voyager/assets/images/widget-backgrounds/03.jpg",
    "revision": "6a845dd6fbebb8f70843486eeb477207"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/app.js",
    "revision": "160a25df5fa66909a3fb8afc2ff635cc"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/advlist/plugin.min.js",
    "revision": "e83b5cd7fbf353c6d1db7162a3c50764"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/anchor/plugin.min.js",
    "revision": "49f13b8b03ab144ea7c22c1ee9bdb135"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/autolink/plugin.min.js",
    "revision": "aacdcbb0c3ca1873c8bf030253d99068"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/autoresize/plugin.min.js",
    "revision": "703af19f65b10585a61d0a74aae32341"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/autosave/plugin.min.js",
    "revision": "7c58584ef1181c4952e4099c124a99a1"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/bbcode/plugin.min.js",
    "revision": "4a01c7c000199637793faa4b3985d87f"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/charmap/plugin.min.js",
    "revision": "5c947eb02a109d45e3e1e18ebae2d370"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/code/plugin.js",
    "revision": "b7f3f7ecebe93ef81f1a340e533eb84e"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/codesample/css/prism.css",
    "revision": "155e9f3a6162c42ff80672057c300f7f"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/codesample/plugin.min.js",
    "revision": "a5639698f37c13a53079727c8f383c71"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/colorpicker/plugin.min.js",
    "revision": "7e86c1cecc74753dcc8b63784c0815a3"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/contextmenu/plugin.min.js",
    "revision": "4c1ca072d908f687a9897600b023bbc0"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/directionality/plugin.min.js",
    "revision": "78302f1959b7a828bba2949c70ffe5f9"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/emoticons/plugin.min.js",
    "revision": "d8d12de4970a95a26b334f717a1d41f6"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/example_dependency/plugin.min.js",
    "revision": "8751593f8a00cc41f908aa4dc5f8c938"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/example/plugin.min.js",
    "revision": "b2d243407d4135cc5e5e89b83a3a9ded"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/fullpage/plugin.min.js",
    "revision": "11f6c6b2ce3787d18f2bb8f8f8c55de8"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/fullscreen/plugin.min.js",
    "revision": "6810818d8602258e5933821331660191"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/css/giphyPopup.css",
    "revision": "2e03661853a83e9198b6b8b6652fc8d8"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/giphy_icon_128.png",
    "revision": "cac3d53b8c60221cba4eb0d7f1403295"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/giphy_icon_16.png",
    "revision": "8a99e32f1736368d60a281ae0628ba37"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/giphy_icon_19.png",
    "revision": "95723be03fe799e79d8ce1aa494cab51"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/giphy_icon_38.png",
    "revision": "15c5458c83d41e990500ee247c59df7d"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/giphy_icon_48.png",
    "revision": "c55141a77225c54348075b7e3efb7fea"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/giphy_logo_txt.png",
    "revision": "b2f8984d70564cdc54a827808df23e86"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_add.png",
    "revision": "4d7ed04ab446c64330b91aa5acfa82f3"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_back.png",
    "revision": "7f5c3d549dc63d3d7b145560df348917"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_categories.png",
    "revision": "b1932cd68ba1bbe28dc4b8e9306b7fed"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_email.png",
    "revision": "8de2b179a7ac7cd6b54c7670c6e9c213"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_facebook.png",
    "revision": "d18d507a2f48120142cde7d7512099e0"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_heart_red.png",
    "revision": "5c28393486b17de3beb24c599af6501e"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_heart_white.png",
    "revision": "57f51830d114a6b15bd882d50850cfe4"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_link_white.png",
    "revision": "e6ecd614149482f35e528566a72cb833"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_menu.png",
    "revision": "ddfa757276303ef79c0676c032697f01"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_reactions.png",
    "revision": "162dc4f478b62fba8c3a3701f85adf4c"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_search.png",
    "revision": "523634860502e53d09a4627065efa479"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_sms.png",
    "revision": "2ed6a323f8d6dd8645fc850df98334a5"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/img/icon_twitter.png",
    "revision": "032400e293ddb7f575e15e67fcf6388d"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/js/giphy_cms_ext.js",
    "revision": "0d4ad49163ab5648a9e2eff4a9594d99"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/js/GiphySearch.js",
    "revision": "2fdc8858992da1630e969f3b7a01df09"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/js/imagesloaded.pkgd.min.js",
    "revision": "858097c9e8c1505ae9405c255800e9d9"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/js/init.js",
    "revision": "11b92ed822aa6b2576765d4102251f79"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/js/jquery.xdomainrequest.min.js",
    "revision": "a32f9c1370fd2461ab6d0847e18a472b"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/js/masonry.pkgd.min.js",
    "revision": "f5f378ecf6a1cda53ab5124217b7c2fb"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/html/js/newT.js",
    "revision": "0ebbbf027526c392d8d54da67d3f367d"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/img/giphyicon20px.png",
    "revision": "e325a00004aa7d3cca11920bd04990e0"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/img/giphyiconoff20px.png",
    "revision": "ae8dd65069d3ef1d90ab43e9c2a8fa4b"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/giphy/plugin.js",
    "revision": "7b83da8ae2eb0e85417cef459abccee5"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/hr/plugin.min.js",
    "revision": "831204a97da9fa6b6784885a930a2743"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/image/plugin.js",
    "revision": "fa50dc6ccf4cbef25f02d61af8e539a8"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/imagetools/plugin.min.js",
    "revision": "928d2aacaf752804e5165c009fd8fbd3"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/importcss/plugin.min.js",
    "revision": "7a493ee552aeb163130556ba511def0c"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/insertdatetime/plugin.min.js",
    "revision": "bb11638b08dab990834ea99f5fa9968b"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/layer/plugin.min.js",
    "revision": "138c49d33788c41bc4c1c770a12376df"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/legacyoutput/plugin.min.js",
    "revision": "3b57a425e01fc4e5071fc7536bfd5951"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/link/plugin.js",
    "revision": "1644065c391f8ee7b086b2ec5c78b19d"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/lists/index.js",
    "revision": "959bf9c345e983ce032814178b94cb09"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/lists/plugin.js",
    "revision": "2dcc24a443c2003f2ef7db798c319df1"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/lists/plugin.min.js",
    "revision": "21cd134bd41b4e4bcd53ecbb4831b29e"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/media/plugin.min.js",
    "revision": "de087cb78cbd0dde2390c4af1069fae8"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/nonbreaking/plugin.min.js",
    "revision": "e23a23bf69315578b8ad2a33527239d2"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/noneditable/plugin.min.js",
    "revision": "a228f197cb981bf1aaf197ab8c2aac88"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/pagebreak/plugin.min.js",
    "revision": "1fc35d4528b84ee8e5cd252b4c9f8b01"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/paste/plugin.min.js",
    "revision": "bfb55c646bd17b5d35aa070659e18a2d"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/preview/plugin.min.js",
    "revision": "0250c7603608a3e4cfd99d04acb21b90"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/print/plugin.min.js",
    "revision": "decfa7db853761fd39407276f607727f"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/save/plugin.min.js",
    "revision": "506ce4b855d9b3f191e8131c1752f8a4"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/searchreplace/plugin.min.js",
    "revision": "1c27346f7036c30c0ed424912d64c831"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/spellchecker/plugin.min.js",
    "revision": "bc7c0c449ec3dd6f6bed8e3dbde9ea46"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/tabfocus/plugin.min.js",
    "revision": "35fac2cfbe20b7806452a9089f25f987"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/table/plugin.js",
    "revision": "22a78781dcf71271ade126f8400a6929"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/template/plugin.min.js",
    "revision": "59d5c38411522f0975bdc443ca391f2c"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/textcolor/plugin.js",
    "revision": "a88c3ad80ffc841eab6dcb960e8a91e1"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/textpattern/plugin.min.js",
    "revision": "c3fed5f3128aa9bc4d2707587860555a"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/toc/plugin.min.js",
    "revision": "bcc02e1ea1d0a9f929e9ddec78dcd808"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/visualblocks/css/visualblocks.css",
    "revision": "7655640530c76e2bfa7b7239da6e6ac9"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/visualblocks/plugin.min.js",
    "revision": "4ad48029ceca76c1de8dd9e37a2d4e09"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/visualchars/plugin.min.js",
    "revision": "d9be30ef0ed803944083faa724a9fed5"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/wordcount/plugin.min.js",
    "revision": "76870a19eb41d6c99e27a6ceba6e3df3"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/css/bootstrap-theme.min.css",
    "revision": "10459dcbb4e4e3ba5fd7324b308be8cc"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/css/bootstrap.min.css",
    "revision": "4eadbf7d1721bb2729e398595bc7f0bc"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/css/style.css",
    "revision": "81a32fab0381d04072e349233e731926"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/fonts/glyphicons-halflings-regular.svg",
    "revision": "3b31e1de93290779334c84c9b07c6eed"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/icon.png",
    "revision": "b46575bdd63c65063e33ed9427b0b9a3"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/js/bootstrap.js",
    "revision": "cd4d2bd0232733e89138fa7be0c67e42"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/js/bootstrap.min.js",
    "revision": "9e25e8e29ef0ea358e9778082ffd97d8"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/js/jQuery.jQTubeUtil.js",
    "revision": "aa7fd70eca3d88af13a8e8b37e7070ad"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/js/jquery.js",
    "revision": "841dc30647f93349b7d8ef61deebe411"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/js/jquery.yt_data_v3.js",
    "revision": "7bb19181d5cca3d9fb781bba0854d8dd"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/js/modernizr.js",
    "revision": "3d30980be1f4c4d097d648511c23b20d"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/js/mustache.js",
    "revision": "1cc4fbd7393a16895e66a08ceb953f9e"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/js/youtube.js",
    "revision": "76bdc117d995f63d809a7f0be20588a2"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/langs/de.js",
    "revision": "163c0163f4c1d4b4f5f8364d273a249b"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/langs/en.js",
    "revision": "6503f40f30877edd7260c83ebb7ff3ba"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/langs/nl.js",
    "revision": "f8d284dd6793533a1e280b4e78fddf83"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/plugin.js",
    "revision": "b543870abc03a3aa0c460b2ca4b65139"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/preview.jpg",
    "revision": "655a17c3d17225def1ab90ca60b2e353"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/slider/css/slide.png",
    "revision": "600c8db430571b2b5029dc352a9d875e"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/slider/css/slider.css",
    "revision": "b927bf3007a9f8c8bfe8c3718bef4547"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/plugins/youtube/slider/js/bootstrap-slider.js",
    "revision": "9cbb4ec3f94f142866fbebab23eb0f55"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/lightgray/content.inline.min.css",
    "revision": "098c69309518b41b42bed8cabf323e8d"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/lightgray/content.min.css",
    "revision": "fbd2a0942b8e274a54fdcbc3cc1dc0d5"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/lightgray/fonts/tinymce-small.svg",
    "revision": "dfbe5c48845df8f039028b5a14a9a611"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/lightgray/fonts/tinymce.svg",
    "revision": "1174ad7cf07afe7fbabaea718fa183da"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/lightgray/skin.ie7.min.css",
    "revision": "31181a1fb8d51e643596cc0e0cf5ea91"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/lightgray/skin.min.css",
    "revision": "2f23226b9075b8e1e729e80c8452a2fe"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/voyager/content.inline.min.css",
    "revision": "098c69309518b41b42bed8cabf323e8d"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/voyager/content.min.css",
    "revision": "2f43b8d54785d06d2e8b5ff395373f88"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/voyager/fonts/tinymce-small.json",
    "revision": "e041fb0d325f73103a921ed01e5356b7"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/voyager/fonts/tinymce-small.svg",
    "revision": "dfbe5c48845df8f039028b5a14a9a611"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/voyager/fonts/tinymce.json",
    "revision": "4756ec6626de6831c38ee2a399e94f16"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/voyager/fonts/tinymce.svg",
    "revision": "1174ad7cf07afe7fbabaea718fa183da"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/voyager/skin.ie7.min.css",
    "revision": "e39d2a36c4a12b6b84c633585f11074d"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/voyager/skin.json",
    "revision": "bb680d45f92de8a6cbff377a7e456453"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/skins/voyager/skin.min.css",
    "revision": "ba1198c002970e7448306e3e083b5ca1"
  },
  {
    "url": "vendor/tcg/voyager/assets/js/themes/modern/theme.js",
    "revision": "1b751911d7f9148f815438699eb4f2fb"
  },
  {
    "url": "vendor/telescope/app-dark.css",
    "revision": "13df33880547628477b2f63924d699dc"
  },
  {
    "url": "vendor/telescope/app.css",
    "revision": "0c1e654d28f1c73326c1aedd2296fd87"
  },
  {
    "url": "vendor/telescope/favicon.ico",
    "revision": "a903f931a3fcbcb88c8c8ab8d5b189b8"
  },
  {
    "url": "vendor/telescope/mix-manifest.json",
    "revision": "236e2c3631e53c55b820b04539c7ba0f"
  }
]);

    // match routes for homepage, blog and any sub-pages of blog
    workbox.routing.registerRoute(
        /^\/(?:(blog)?(\/.*)?)$/,
        new workbox.strategies.NetworkFirst({
            cacheName: 'static-resources',
        })
    );

    // js/css files
    workbox.routing.registerRoute(
        /\.(?:js|css)$/,
        new workbox.strategies.StaleWhileRevalidate({
            cacheName: 'static-resources',
        })
    );

    // images
    workbox.routing.registerRoute(
        // Cache image files.
        /\.(?:png|jpg|jpeg|svg|gif)$/,
        // Use the cache if it's available.
        new workbox.strategies.CacheFirst({
            // Use a custom cache name.
            cacheName: 'image-cache',
            plugins: [
                new workbox.expiration.Plugin({
                    // Cache upto 50 images.
                    maxEntries: 50,
                    // Cache for a maximum of a week.
                    maxAgeSeconds: 7 * 24 * 60 * 60,
                })
            ],
        })
    );

}