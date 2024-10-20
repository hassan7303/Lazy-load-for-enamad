window.addEventListener('load', function() {

    fetch(custom_ajax_object.ajaxurl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            action: 'load_custom_shortcode'
        })
    })
    .then(function(response) {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text(); // برگرداندن پاسخ به عنوان متن
    })
    .then(function(data) {
        console.log("AJAX response:", data);
        // محتوای شورتکد را در صفحه درج کنید
        document.querySelector('.shortcode-placeholder').innerHTML = data;
    })
    .catch(function(error) {
        console.error('There was a problem with the fetch operation:', error);
    });
    
});