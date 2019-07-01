<?php

use App\Models\Levels\Mission;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mission::create([
        	'village_id' => 1,
            'label' => 'Retrata la realidad',
            'icon' => 'icono.png',
            'challenge_no' => 5,
            'desc_one' => '
                Marvin, hemos hablado de la pobreza como un problema de esta aldea.
                Necesito que elabores un reporte sobre los indicadores de pobreza que se observan en alguna zona que esté cerca de donde tú te encuentras.
                ¿Aceptas la misión?
                <br><br>
                Para realizar esta misión necesitas un dispositivo con cámara y audio que te permita registrar y describir lo que ves. Tu video debe durar de 3 a 5 minutos.  También deberás apoyarte de un humano mayor de edad que te acompañe cuando salgas a explorar.
                ¡Nunca salgas solo!
                <br><br>
                Para completar la misión debes resolver cinco retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' => '',
            'desc_three' => '',
            "coordinates"=>"3544,526,NaN",
            "mobile_coordinates"=>"2078,1491,NaN",
            "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 1,
            'label' => 'Chef comunitario',
            'icon' => 'icono.png',
            'challenge_no' => 3,
            'desc_one' => '
                ¡Hola Marvin!
                <br><br>
                En Hunab-Ku es importante reconocer la pobreza desde distintos aspectos. Uno de ellos es el hambre. Me gustaría que analices el papel de los comedores comunitarios para combatir este problema social;   que veas cómo afecta a los humanos, qué consecuencias trae para la sociedad y que tengas un acercamiento con los que viven esta realidad.
                <br><br>
                ¿Te animas a llevar a cabo  la misión?
                <br><br>
                ¡Qué bien Marvin!
                <br><br>
                ¿Has escuchado hablar de los “Comedores comunitarios”?
                <br><br>
                Yo he oído que se trata de un programa que atiende a humanos en situación de pobreza que no tienen posibilidades de alimentarse sanamente. Aprenderás de qué se trata esto, a quiénes atienden, cómo funcionan y resolverás cualquier otra inquietud que te surja sobre el tema.
                <br><br>
                Para completar la misión debes resolver tres retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' => '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"6778,916,NaN", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 1,
            'label' => 'Visita un hospital',
            'icon' => 'icono.png',
            'challenge_no' => 4,
            'desc_one' => '
                ¡Bienvenido Marvin!
                <br>
                En Hunab - Ku uno de los temas a resolver son los servicios de salud. En esta misión conocerás un poco sobre lo que sucede en los hospitales y centros de salud, así como las problemáticas que enfrentan y cómo las resuelven.
                Sal a explorar y comparte  tu experiencia.
                <br><br>
                Existe un contraste muy grande entre los sistemas de salud pública y salud privada. No entiendo muy bien cómo funcionan, cuáles son sus diferencias y sus principales dificultades.
                <br><br>
                Para completar la misión debes resolver cuatro retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' => '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"9392,515,NaN", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 1,
            'label' => 'Navegantes BE',
            'icon' => 'icono.png',
            'challenge_no' => 3,
            'desc_one' => '
                ¡Bienvenido Marvin!
                <br><br>
                En esta misión tendrás un acercamiento a aquellas zonas donde escasea el agua. Conocerás los motivos y las consecuencias de este fenómeno.
                <br><br>
                Me gustaría que me ayudes en esta exploración. ¿Aceptas?
                <br><br>
                El agua es uno de los elementos vitales para cualquier ser vivo. En Hunab - Ku es uno de los recursos que escasea debido a su explotación y a la sobrepoblación, situación que se vuelve cada vez más común.
                <br><br>
                Para completar la misión debes resolver dos retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"11227,755,NaN", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 2,
            'label' => 'El vagón de la seguridad',
            'icon' => 'icono.png',
            'challenge_no' => 5,
            'desc_one' => '
                ¡Bienvenido Marvin!
                <br><br>
                Como has visto, uno de los temas importantes a tratar en esta aldea es la igualdad. Los humanos dicen ser incluyentes, tolerantes y empáticos. Sin embargo, existen situaciones que no concuerdan con ello. Ayúdame a entender y conocer la realidad del tema con esta misión.
                <br><br>
                ¿Me ayudas?
                <br><br>
                Durante esta misión analizaremos una situación que se presenta en el transporte público de una de las ciudades de Ixchel, relacionada con la igualdad de género.
                <br><br>
                Para completar la misión debes resolver tres retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 2,
            'label' => 'Política de paz',
            'icon' => 'icono.png',
            'challenge_no' => 3,
            'desc_one' => '
                ¡Hola Marvin!
                <br><br>
                En Ixchel, la violencia ha sido una de las principales causas por las que la población vive con miedo y limita sus actividades diarias.
                <br>
                Éste es un fenómeno que necesita la atención de funcionarios de gobierno y sociedad en general, así que que me gustaría contar con tu ayuda para elaborar una propuesta de política pública que presentaremos ante el Congreso.
                <br>
                ¿Me ayudas a elaborarla?
                <br><br>
                Para realizar esta misión analizaremos el problema de la violencia y buscaremos contribuir a reducir sus índices hasta erradicarla.
                <br>
                Para completar la misión debes resolver dos retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear el siguiente.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 2,
            'label' => 'Mi escuela ideal',
            'icon' => 'icono.png',
            'challenge_no' => 4,
            'desc_one' => '
                ¡Hola Marvin!
                <br><br>
                La educación es una de las bases para el desarrollo íntegro del ser humano y la escuela uno de los lugares más importantes para  llevar a cabo este proceso. Sin embargo, en Ixchel es una de las mayores dificultades.
                <br><br>
                ¿Diseñamos la escuela ideal?
                <br><br>
                Contar con escuelas dignas es responsabilidad de todos. ¿Cómo imaginas que es la escuela ideal?¿Qué elementos son los más importantes?
                <br><br>
                Para completar la misión debes resolver tres retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 3,
            'label' => 'Construye tu ciudad sostenible',
            'icon' => 'icono.png',
            'challenge_no' => 4,
            'desc_one' => '
                Zamná es la protagonista de esta misión y junto con ella el tema de las ciudades sostenibles. Desde mi laboratorio, aun no me ha sido posible conocer alguna de cerca, por eso me encantaría que diseñes una y nos la muestres.
                <br><br>
                Es hora de que pongas a prueba al arquitecto que llevas dentro. ¿Te animas?
                <br><br>
                Para realizar esta misión conoceremos un poco más sobre las ciudades sostenibles y pondrás a prueba tu creatividad para diseñar la mejor ciudad sostenible posible.
                <br><br>
                Para completar la misión debes resolver tres retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 3,
            'label' => 'Exploración industrial',
            'icon' => 'icono.png',
            'challenge_no' => 5,
            'desc_one' => '
                Marvin, la industria es cada vez más importante en Zamná, pero aparentemente su desarrollo tiene un impacto en el ambiente. Por ello, necesito que te conviertas en mi informante y me describas qué está sucediendo con las empresas y cómo éstas están apoyando al cuidado ambiental.
                <br><br>
                ¡Recuerda que siempre debes salir con un humano adulto!
                <br><br>
                Esta es una misión de suma importancia y requiere de tu mejor esfuerzo para lograrla ¿aceptas?
                <br><br>
                ¿Cuáles son los contaminantes que arrojan los diferentes tipos de empresas? ¿Qué medidas preventivas pueden o podrían llevar a cabo las empresas para proteger el ambiente? Éstas son algunas de las preguntas que intentaremos responder a lo largo de esta misión.
                <br><br>
                Para completar la misión debes resolver cuatro retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 3,
            'label' => 'Entrevista a un jefe',
            'icon' => 'icono.png',
            'challenge_no' => 4,
            'desc_one' => '
                ¡Hola Marvin!
                <br><br>
                Una de las habilidades más importantes de un explorador Be es la capacidad de entrevistar a personajes interesantes del Mundo Be, que nos ayuden a entender lo que sucede en las aldeas.
                <br><br>
                En esta ocasión pondrás a prueba tu habilidad como explorador y entrevistarás a un jefe y a un colaborador de alguna empresa,
                <br><br>
                ¿Te atreves?
                <br><br>
                Esta misión te permitirá aprender sobre la perspectiva de las partes que conforman una empresa con respecto a la forma en que funciona y las condiciones de trabajo que ofrece.
                <br><br>
                Para completar la misión debes resolver cuatro retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 4,
            'label' => 'Mi voto en el congreso',
            'icon' => 'icono.png',
            'challenge_no' => 5,
            'desc_one' => '
                ¡Bienvenido a esta misión!
                <br>
                Como miembro del Congreso de Yum-kaax debes emitir un voto a favor o en contra de temas relacionados con el consumo de energía, que son importantes para tu país.
                Es una tarea que requiere compromiso, pues tu decisión puede hacer la diferencia con respecto al desarrollo de la aldea.
                <br><br>
                ¿Aceptas?
                <br><br>
                Para completar la misión debes resolver cuatro retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 4,
            'label' => '¿Separamos la basura?',
            'icon' => 'icono.png',
            'challenge_no' => 4,
            'desc_one' => '
                En Yum-kaax se recolectan 46 toneladas al año de basura, ¿puedes imaginar eso Marvin?
                <br>
                En esta misión explorarás cómo es que los humanos organizan su basura. Considero que a partir de un buen diagnóstico podríamos ayudar a reducir la cantidad que se produce.
                <br><br>
                ¿Estás dispuesto a ayudarme Marvin?
                <br><br>
                Esas grandes cantidades de basura podrían reducirse si los humanos separaran los residuos de acuerdo a sus características. Esto permitiría reciclar y aprovechar recursos.
                <br><br>
                Para completar la misión debes resolver tres retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 4,
            'label' => 'Agente consumidor',
            'icon' => 'icono.png',
            'challenge_no' => 5,
            'desc_one' => '
                ¡Hey Marvin! Es momento de hacer una introspección!
                <br><br>
                Debes reflexionar sobre tus propias acciones como agente consumista y reconocer a través de las actividades que realizas durante el día, la cantidad de basura que generas y cómo impacta en el ambiente.
                <br><br>
                Será una tarea divertida e interesante, ¿te animas?
                <br><br>
                Para completar la misión debes resolver cuatro retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 4,
            'label' => 'Reconociendo los ecosistemas',
            'icon' => 'icono.png',
            'challenge_no' => 4,
            'desc_one' => '
                Marvin ¿eres consciente de los ecosistemas que te rodean?¿Cuál reinaba antes en la ciudad donde vives? ¿Cuál predomina ahora? En esta misión deberás indagar, cuestionar y reflexionar sobre los ecosistemas que hay a tu alrededor.
                <br>
                ¿Me ayudas?
                <br><br>
                Yum-kaax está rodeado de ecosistemas naturales que con la evolución del ser humano y el crecimiento de la urbanización, han sufrido cambios e incluso han desaparecido.
                <br><br>
                Para completar la misión debes resolver tres retos. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);

        Mission::create([
            'village_id' => 4,
            'label' => 'Cambio de horario',
            'icon' => 'icono.png',
            'challenge_no' => 5,
            'desc_one' => '
                Desde hace más de 20 años Yum-kaax implementó un cambio de horario dos veces al año -uno en verano y otro en invierno-, con la finalidad de ahorrar energía y contribuir a la reducción del calentamiento global. Durante este último año, un grupo de aldeanos Be se ha cuestionado la pertinencia de esta iniciativa y se ha propuesto su eliminación.
                <br><br>
                En esta misión deberás informar a la población lo que sucede y reducir la incertidumbre.
                <br><br>
                Para completar la misión debes resolver cuatro retos y elaborarás una nota periodística. Da clic en el primero y realiza la actividad, ello te permitirá desbloquear los siguientes.
            ',
            'desc_two' =>  '',
            'desc_three' => '',"mobile_coordinates"=>"2078,1491,NaN", "coordinates"=>"prueba", "background"=>"hola"
        ]);




    }
}
