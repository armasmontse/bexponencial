<div id="sidebar" class="sidebar sidebar-user">
    <ul class="sidebar__container">
        <li class="sidebar__items">
            <router-link :to="{name: 'home'}" >
                @include ('images.tu-mundo')
                <span>Tu Mundo</span>
            </router-link>
        </li>
        <li class="sidebar__items">
            <router-link :to="{name: 'map'}" >
                @include ('images.mapa-new')
                <span>Mapa MundoBe</span>
            </router-link>
        </li>
        @foreach ($blocks->villages as $village)
        <li class="sidebar__items">
            <router-link :to="{name: 'villages', params: {id:{{$village->id}}}}" >
                @include ('images.mapa')
                <span>{{$village->label}}</span>

                <div class="sidebar__subitems">
                    @include ('images.perfil')
                    <a href="#">
                        Intro
                    </a>
                    @foreach ($village->missions as $mission)
                    <router-link :to="{ name: 'mission', params: { id: {{$mission->id}}} }">
                        <span>@include ('images.mission')</span>
                        {{-- <p class="title">{{$mission->label}}</p> --}}
                        <p class="title">Misión</p>
                    </router-link>
                    @endforeach
                    <router-link :to="{ name: 'secretFile', params: { id: 1} }">
                        Archivo secreto
                    </router-link>
                </div>
            </router-link>
        </li>
        @endforeach

        <li class="sidebar__items">
            <router-link :to="{name: 'globalChallenge', params: 1}" >
                @include ('images.reto-global-new')
                <span>Reto Global</span>
            </router-link>
        </li>
    </ul>
</div>
