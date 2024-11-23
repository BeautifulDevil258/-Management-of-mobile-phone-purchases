<div id="owl-demo" class="owl-carousel-slider owl-carousel owl-theme">
    <?php
    $list_banner = $this->Mslider->list_img_banner();
    foreach ($list_banner as $value) : ?>
        <div class="item"><img src="<?php echo base_url() ?>public/images/banners/<?php echo $value['img']; ?>"></div>
    <?php endforeach; ?>
</div>

<script>
    $("#owl-demo").owlCarousel({
        animation: "slide",
    controlNav:"true",
        autoPlay: 5000, //thoi gian chay slide 5 seconds
        items: 1,
        mouseDrag:true,
        touchDrag:true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3500,
    });
</script>