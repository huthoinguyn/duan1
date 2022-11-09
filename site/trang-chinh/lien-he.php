<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../../content/css/lienhe.css">
    <title>T-Coffee Contact</title>
</head>

<body>
    <div class="contact-container">
        <div class="contact-wrap">
            <div class="map-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62860.63914868875!2d105.72255072784505!3d10.034185113828485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ-G6p24gVGjGoSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1658845557769!5m2!1svi!2s" style="border: 0" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            </div>
            <div class="form">
                <h3 class="title">Send us your message</h3>
                <form action="" name="submit-to-google-sheet">
                    <input type="text" name="Name" placeholder="Full Name" />
                    <input type="tel" name="Phone" placeholder="Phone Number" />
                    <input type="email" name="Email" placeholder="Email Address" />
                    <textarea name="Message" id="" rows="6" placeholder="Message"></textarea>
                    <input type="submit" value="Send" class="button">
                </form>
            </div>
        </div>
    </div>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbzTCDloueq0Pd3ZxtDmkvyLncdTkIkjpbyy8bfDaig/dev'
        const form = document.forms['submit-to-google-sheet']

        form.addEventListener('submit', e => {
            // e.preventDefault()
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => console.log('Success!', response))
                .catch(error => console.error('Error!', error.message))
        })
    </script>
</body> 

</html>