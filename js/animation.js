$(function () {

    /* 荳企Κ縺九ｉ繝ｪ繝ｳ繧ｯ逕ｨ繧｢繧ｳ繝ｼ繝�ぅ繧ｪ繝ｳ縺悟�迴ｾ */
    var Accordion = function (el, multiple) {
        this.el = el || {};
        // more then one submenu open?
        this.multiple = multiple || false;

        var dropdownlink = this.el.find('.dropdownlink');
        dropdownlink.on('click',
            { el: this.el, multiple: this.multiple },
            this.dropdown);
    };

    Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el,
            $this = $(this),
            //this is the ul.submenuItems
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            //show only one menu at the same time
            $el.find('.submenuItems').not($next).slideUp().parent().removeClass('open');
        }
    }
    var accordion = new Accordion($('.accordion-menu'), false);


    /*縲繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ縺輔ｌ繧九→繝ｭ繧ｴ縺悟�迴ｾ縲*/
    // $(window).scroll(function () {
    //     if ($(this).scrollTop() > 100) {
    //         $('div#top-fixed').css('background-image', 'url(./img/sp/titlelogo.png)');
    //     } else {
    //         $('div#top-fixed').css('background-image', 'none');
    //     }
    // });

    /* 繧ｹ繝�繝ｼ繧ｺ繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ */
    $('[href^="#"]').click(function () {
        var speed = 800;
        var href = $(this).attr('href');
        var target = $(href == '#' || href == '' ? 'html' : href);
        var position = target.offset().top;
        $('html, body').animate({ scrollTop: position }, speed, 'swing');
        return false;
    });

    /*縲縲荊op縺ｸ謌ｻ繧九阪′荳九∈縺壹ｉ縺吶→豸医∴繧� */
    var topBtn = $('.top');
    topBtn.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    topBtn.click(function () {
        $('body,html').animate(
            {
                scrollTop: 0
            },
            500
        );
        return false;
    });

})

//doctorIntroduction
$(function () {
    var checkWidth = function () {
        var browserWidth = $(window).width();
        // console.log(browserWidth);
        $('.row').each(function () {
            var txt = $(this).html();
            if (browserWidth <= 767) {
                console.log('蜈･縺｣縺�')
                $(this).html(
                    txt.replace(/莉頑搗螳怜離/g, '笳�')
                        .replace(/莉頑搗蜿狗ｾ�/g, '笳�')
                );
            } else {
                $(this).html(
                    txt.replace(/笳�/g, '莉頑搗螳怜離')
                    // .replace(/笳�/g, '莉頑搗蜿狗ｾ�')
                );
                console.log($("#pink").text())
                $("#pink1").text('莉頑搗蜿狗ｾ�')
                $("#pink2").text('莉頑搗蜿狗ｾ�')

            }
        });
    }
    $(function () {
        checkWidth();
        $(window).resize(checkWidth);
    });
});

//info
$(function () {
    var checkWidth = function () {
        var browserWidth = $(window).width();
        // console.log(browserWidth);
        if (browserWidth >= 767) {
            $('#info dt p').each(function () {
                var txt = $(this).html();
                console.log(txt)
                $(this).html(
                    txt.replace(/<br>/g, ',')
                );
            });
        } else {
            $('#info dt p').each(function () {
                var txt = $(this).html();
                console.log(txt)
                $(this).html(
                    txt.replace(/,/g, '<br>')
                );
            });
        }
    };

    $(function () {
        checkWidth();
        $(window).resize(checkWidth);
    });

    $(function () {
        $('.js-modal-open').each(function () {
            $(this).on('click', function () {
                var target = $(this).data('target');
                var modal = document.getElementById(target);
                $(modal).fadeIn();
                return false;
            });
        });
        $('.js-modal-close').on('click', function () {
            $('.js-modal').fadeOut();
            return false;
        });
    });
});

//削除を押した時にOKなら削除、キャンセルなら実行しない
function MoveChak() {
  return(confirm('本当に削除しますか？'));
}
