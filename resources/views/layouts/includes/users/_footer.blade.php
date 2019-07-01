<div class="footer-mobile footer-mobile">
    <div class="footer-mobile__color-space"></div>
    <ul class="footer-mobile__container">
        <li class="footer-mobile__items">
            <router-link :to="{name: 'map'}" >
                @include ('images.mapa-new')
                <span>Mapa MundoBe</span>
            </router-link>
        </li>
        <li class="footer-mobile__items">
            <router-link :to="{name: 'map'}" >
                @include ('images.archivo-secreto')
                <span>Archivo secreto</span>
            </router-link>
        </li>
        <li class="footer-mobile__items">
            <router-link :to="{name: 'globalChallenge', params: 1}" >
                @include ('images.reto-global-new')
                <span>Reto Global</span>
            </router-link>
        </li>
    </ul>
</div>

<footer class="footer">
    <div class="footer__container">
        <div class="social">
            <a href="#">
                <img class="icon" src="{{ asset('images/FB.svg') }}" alt="" />
            </a>
            <a href="#">
                <img class="icon" src="{{ asset('images/twitter.svg') }}" alt="" />
            </a>
            <a href="#">
                <img class="icon" src="{{ asset('images/instagram.svg') }}" alt="" />
            </a>
            <a href="#">
                <img class="icon" src="{{ asset('images/youtube.svg') }}" alt="" />
            </a>
        </div>
        <div class="contact">
            <a class="contact__mail" href="mailto:info@bexponencial.com">info@bexponencial.com</p>
            <p class="contact__phone">T (52) 55 6282 9078</p>

        </div>
        <div class="about">
            <a href="#">Acerca de</a>
            <a href="#">Términos de condiciones</a>
            <a href="#">Aviso de privacidad</a>
            <router-link :to="{name: 'faq'}" class="">FAQ</router-link>
            <p >Bexponencial 2019 	&#9400;</p>
        </div>
    </div>
</footer>

