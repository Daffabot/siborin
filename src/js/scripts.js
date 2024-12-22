        $(document).ready(function () {
            const audio = $('.audioSound')[0];
            setTimeout(function () {
            $('.container-custom').removeClass('d-none');
            $(".loader-screen").remove();
            if (audio) {
                audio.play().catch(function(error) {
                    console.log('Playback error:', error);
                });
            }
            }, 5000);
        });

        $(document).ready(function() {
            let $carousel = $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 10000
            });
            $carousel.on('changed.owl.carousel', function(event) {
            // Hentikan semua video di carousel
            $('.carousel-video').each(function() {
                this.pause();
                this.currentTime = 0; // Reset ke awal
            });

            // Dapatkan elemen video dari item aktif
            let currentItem = $('.owl-item').eq(event.item.index).find('.carousel-video');

            // Putar video jika ditemukan
            if (currentItem.length) {
                currentItem[0].play();
            }
        });
        });

        function checkForNewMedia() {
            $.ajax({
                url: 'check.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.latest_image_id > latestImageId || data.latest_music_id > latestMusicId || data.latest_video_id > latestVideoId) {
                        localStorage.setItem('flag', 'true');
                    }
                    if (data.latest_image_id != latestImageId || data.latest_music_id != latestMusicId || data.latest_video_id != latestVideoId) {
                        // Jika ada media baru, reload halaman
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Cek media terbaru setiap 5 detik
        setInterval(checkForNewMedia, 5000);

        function openEnvelope() {
            $('#overlay').show();
            $('#envelopeModal').show();
            setTimeout(() => {
                $('.envelope__flap').css('animation', 'openEnvelope 4s forwards');
            }, 2000);
            setTimeout(() => {
                $('#overlay').hide();
                $('#envelopeModal').hide();
                $('.envelope__flap').css('animation', '');
            }, 3000);
        }

        const flag = localStorage.getItem('flag');
        const notif = $('#notifSound')[0];
        notif.muted = true;
        if (flag === 'true') {
            setTimeout(() => {
                openEnvelope();
                console.log("outer (mail)");
                notif.play().then(() => {
                    // Setelah diputar sekali tanpa suara, unmute audio
                    notif.muted = false;
                }).catch(function(error) {
                    console.log('Playback error:', error);
                });
            }, 5000);
            localStorage.setItem('flag', 'false');
        }