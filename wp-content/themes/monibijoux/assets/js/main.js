jQuery(document).ready(function($) {
  try {
    // menu burger
    const menuBtn = $('#burger-btn');
    const menu = $('#menu');
    const closeBtn = $('#close-btn')

    menuBtn.on('click', function() {
      menu.toggleClass('active-menu');
    });

    closeBtn.on('click', function() {
      menu.removeClass('active-menu');
    });

    // set data-wow-delay
    var $wowElements = $('.custom-product-item');
    let delay = 0;
    let counter = 0;

    $wowElements.each(function(index, element) {
      $(element).attr('data-wow-delay', `0.${delay}` + 's');

      counter++;
      delay++;

      if (counter === 4) {
          delay = 0;
          counter = 0;
      }
      console.log(element);
      
    });

    // reviews slider
    const swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 50,
      navigation: {
        nextEl: ".arrow-next",
        prevEl: ".arrow-prev",
      },
      breakpoints: {
        1250: {
          slidesPerView: 2,
          spaceBetween: 50,
        },
      }
    });

    // set active quantity btn after changing quantity
     let $loader = $('<div id="loader-wrapper"><div id="loader"></div></div>').appendTo('body').hide();

    $('.update-cart').on('click', function(e) {
      e.preventDefault();

      $loader.fadeIn();

      var form = $(this).closest('form');
      $.post(form.attr('action'), form.serialize(), function(response) {
        $('.woocommerce-cart-form').html($(response).find('.woocommerce-cart-form').html());

        $.get('/wp-json/wc/v3/cart', function(cart) {
            let cartQuantity = cart.item_count;
            $('.basket-count').text(cartQuantity);
        });

        $loader.fadeOut();
      });
    });

    $(document).on('change', '.qty', function() {
      $('.update-cart').prop('disabled', false);
    });

    $('main.main').on('click', '.quantity button', function () {
      let btn = $(this);
      let groupedProducts = btn.closest('.woocommerce-grouped-product-list-item__quantity').length;
      let qtyInput = btn.parent().find('.qty');
      let prevValue = +(qtyInput.val());
      let newValue = groupedProducts ? 0 : 1;

      if (btn.hasClass('single-product-page-btn-plus')) {
        newValue = prevValue + 1;
      } else {
        if (!groupedProducts && prevValue > 1) {
          newValue = prevValue - 1;
        } else if (groupedProducts && prevValue > 0) {
          newValue = prevValue - 1;
        }
      }

      qtyInput.val(newValue);

      $('.update-cart').prop('disabled', false)
    });
  } catch (error) {
    console.log(error);
  }
});