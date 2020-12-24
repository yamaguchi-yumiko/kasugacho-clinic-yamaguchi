<!--header共通 -->
<?php require_once('header.php'); ?>
<main>
    <!-- aside共通 -->
    <?php require_once('aside.php'); ?>
    <!-- access -->
    <section id="info">
        <h1>お知らせ</h1>
        <div class="info">
            <h2>診療所からのお知らせ</h2>
            <dl>
                <dt>
                    <p>
                        May 28,2019
                    </p>
                </dt>
                <dd>
                    <p class="w-25">
                        夏季休暇日
                    </p>
                    <a class="js-modal-open btn-info" data-target="modal01">▼お知らせ</a>
                </dd>
            </dl>
            <dl>
                <dt>
                    <p>
                        June 11,2018
                    </p>
                </dt>
                <dd>
                    <p class="w-20">
                        スギ花粉症・ダニによるアレルギー性鼻炎に<span></span>対する舌下免疫治療法を始めました。
                    </p>
                    <p class="w-13 consultation">
                        &nbsp;スギ花粉賞、ダニアレルギー性鼻炎の治療法の一つに舌下免疫治療法があります。
                        &nbsp;スギ花粉症に関しては治療を開始できる時期が決まっています。（ダニアレルギー性鼻&nbsp;炎治療は通年開始できます。）
                        &nbsp;治療に興味のある患者様はお気軽に来院時にご相談ください。
                    </p>
                    <a href="" class="js-modal-open btn-info" data-target="modal02">▼お知らせ</a>
                </dd>
            </dl>
        </div>
    </section>
    <div id="modal01" class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <a class="js-modal-close" href="">×</a>
            <h2>夏季休暇<span>May&nbsp;28,2019</span></h2>
            <p>
                8月15日（月）～8月22日（日）までの間、夏季休暇となります旨ご了承ください。
            </p>
        </div>
        <!--modal__inner-->
    </div>
    <!--modal-->
    <div id="modal02" class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <a class="js-modal-close" href="">×</a>
            <h2>スギ花粉症・ダニによるアレルギー性鼻炎に対する舌下免疫療法を始めました<span>June&nbsp;11,&nbsp;2018</span></h2>
            <p>
                スギ花粉症、ダニアレルギー性鼻炎の治療の一つに舌下免疫療法があります。
                スギ花粉症に関しては治療を開始できる時期が決まっています。（ダニアレルギー性鼻炎治療は通年開始できます）
            </p>
            <p>
                治療に興味のある患者様はお気軽に来院時にご相談ください。
            </p>
        </div>
        <!--modal__inner-->
    </div>
    <!--modal-->
</main>
<!--fooder共通 -->
<?php require_once('fooder.php'); ?>