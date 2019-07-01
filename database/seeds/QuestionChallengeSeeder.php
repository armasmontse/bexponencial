<?php

use App\Models\Levels\Challenges\Questions_Challenge;
use Illuminate\Database\Seeder;

class QuestionChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Questions_Challenge::create([
            'challenge_id' => 1,
            'question_type_id' => 1,
            'question' => '
				Haz un listado de preguntas que te ayuden a resolver la misión. Si no se te ocurre cómo empezar, te comparto algunas ideas en la caja de preguntas o puedes preguntarle a los humanos que están a tu alrededor.
				<br><br>
				¡Mientras más sean,  mucho mejor!
				<br><br>
				Coloca tus preguntas en el espacio destinado para ello.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 1,
            'question_type_id' => 1,
            'question' => '
				Ahora es momento de responder tus preguntas. Para ello puedes consultar el archivo secreto o navegar por la web. Si lo deseas puedes entrevistar a  humanos que conozcan del tema y te ayuden con algunos hallazgos. Toma fotografías o video.
				<br><br>
				Una vez que concluyas tu exploración, lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				¿Qué material consultaste? ¿Cuáles fueron tus principales hallazgos?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 1,
            'question_type_id' => 5,
            'question' => '
				¿Tuviste la oportunidad de entrevistar a humanos? De ser así comparte evidencias de tu experiencia. Esta actividad es opcional, con una recompensa adicional.
				<br><br>
				Elige el tipo de archivo que quieres cargar cómo evidencia de tu entrevista. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => false
        ]);

        Questions_Challenge::create([
            'challenge_id' => 2,
            'question_type_id' => 1,
            'question' => '
				Ahora que ya tienes todos los hallazgos, organiza las ideas que te surgieron en dos secciones. En la primera coloca todo lo que te haya llamado la atención o las ideas interesantes que tengas a partir de lo explorado. En la segunda incluye los hallazgos o ideas que te serán útiles para concluir el reto.
				<br><br>
				Coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				¿Qué te resultó  más interesante?
                <br><br>
                ¿Qué te resultó  más útil?
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);



        Questions_Challenge::create([
            'challenge_id' => 3,
            'question_type_id' => 2,
            'question' => '
				¡Ha llegado el momento de salir!
				<br><br>
				1. Escribe un guión con las cosas en las que tengas que centrar tu atención y creas que puedes encontrar durante tu exploración en la zona. Esto te servirá para que durante la grabación del video no pierdas el objetivo de vista.
				¡Recuerda que en esta misión necesitamos conocer los indicadores de pobreza!
				<br>
				2. Dirígete a la zona que vas a explorar. Por seguridad ¡no olvides ir acompañado de un humano mayor de edad!
				<br>
				3. Registra tu viaje con la cámara mientras vas narrando lo que observas. Describe detalladamente lo que sucede mientras haces tu recorrido, así como los factores de pobreza visibles y cómo te hace sentir ese contexto.
				<br>
				4. Al terminar, regresa a casa y carga el video en tu cuenta de YouTube. Inserta la liga en el espacio asignado.
				<br><br>
				¡Me encantará verlo!
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 4,
            'question_type_id' => 5,
            'question' => '
				¡Genial! Ya estás muy cerca de concluir esta misión.
				<br><br>
				1. Revisa nuevamente tu video y en relación a tu experiencia, realiza una lista de preguntas que te ayuden a  conocer un poco más del tema. Si necesitas orientación para generar estas preguntas revisa la caja de preguntas.
				<br>
				2. Si lo crees necesario regresa al archivo secreto para recordar los hallazgos relacionados con el tema, o explora en internet acerca de ello.
				<br>
				3. Expresa tu opinión de manera informada y justificada, añadiendo algunas acciones que consideras son necesarias para mejorar el entorno.
				<br>
				4. Comparte tu propuesta a través de una presentación, narración en un documento o incluso puedes continuar el vídeo que realizaste añadiendo tu opinión al final.
				<br>
				5. Cuando lo tengas listo, súbelo.
				<br><br>
				Elige el tipo de archivo que quieres cargar cómo respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 5,
            'question_type_id' => 1,
            'question' => '
				¡Excelente labor Marvin!
				<br><br>
				Ahora lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello.
				<br>
				¿Qué obstáculos enfrentaste para el desarrollo del reto?
                <br />
                ¿Cómo los resolviste y qué sentiste al lograrlo?
				<br><br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);



        Questions_Challenge::create([
            'challenge_id' => 6,
            'question_type_id' => 3,
            'question' => '
				Realiza una pequeña exploración sobre los comedores comunitarios; eres completamente libre para obtener los hallazgos que necesites por el medio que quieras. También puedes visitar el archivo secreto.  ¡Tú decide!
				<br><br>
				Utiliza un procesador de texto para organizar de la forma que prefieras toda la información recabada. Una vez que concluyas guárdalo en formato PDF y súbelo en el espacio destinado para ello. Verifica que tu archivo no rebase los 20 MB, de lo contrario no podrás cargarlo.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 7,
            'question_type_id' => 6,
            'question' => '
				¡Muy bien Marvin! Ahora me queda más claro lo que es un comedor comunitario. Me llama mucho la atención  la labor que desempeñan estos lugares. Es bastante interesante. ¿No lo crees?
				<br><br>
				Me encantaría que pudiéramos tener un contacto más cercano con alguno de estos. Así que en este reto te pediré que localices algún comedor comunitario cercano a ti. Ten en mente que lo visitarás y para hacerlo necesitas la compañía de un humano mayor de edad.
				<br><br>
				¡No lo olvides! Siempre que salgas debes ir acompañado.
				<br><br>
				Espera, antes de salir a explorar pregúntate qué es lo que necesitas saber y define el objetivo de tu visita. Si deseas puedes contarle a un amigo o familiar acerca del reto para que te orienten sobre qué puntos sería importante resolver. También puedes darte una vuelta por la caja de preguntas.
				<br><br>
				Escribe todas tus preguntas. Es muy importante que las tengas presentes el día de tu visita.
                <br> <br>
                Para finalizar el reto, en el siguiente espacio comparte  la ubicación del comedor que elegiste y las preguntas que utilizarás como guía.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 8,
            'question_type_id' => 10,
            'question' => '
            ¡Vamos muy bien! Es momento de prepararnos para nuestra visita. Ponte en contacto con el lugar y solicita una cita. Cuando llegue el día ve dispuesto a participar en las actividades del lugar, a platicar con los humanos que asisten y obtener hallazgos sobre su opinión respecto al comedor.
            <br>
            ¡No olvides ir acompañado de un humano mayor de edad!
            El reto es ser un observador activo. Ten presentes las preguntas que te hiciste e intenta responderlas.
            <br>
            Respalda tu visita con evidencias: notas, fotografías, videos o grabaciones de sonido para que puedas compartir tu experiencia.
            <br><br>
            Comparte tus hallazgos con una presentación, un documento de texto o un video. Describe tu experiencia. ¿Harías cambios en el lugar? ¿Cuáles?
            <br><br>
            Elige el tipo de archivo que quieres cargar cómo respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
            <br><br>
            Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 9,
            'question_type_id' => 10,
            'question' => '

            No podemos visitar un hospital o una clínica sin antes saber qué pasa con el sistema de salud en nuestra comunidad
            <br><br>
            Necesitamos conocer un poco sobre las principales características del sector salud de la ciudad donde te encuentras ubicado actualmente: ¿cómo funciona?, ¿cómo se organiza?
            <br>
            Elabora una lista de preguntas que te guíen para saber qué necesitas antes de visitar algún hospital  y qué deseas conocer.  Si tienes dudas sobre qué preguntar consulta la caja de preguntas. Mientras más te cuestiones, más hallazgos podrás obtener.
            <br><br>
            Busca la respuesta a tus preguntas a partir de las fuentes que tu consideres adecuadas, no necesitamos una exploración profunda, simplemente tener claras las principales características de dicho sector. Si lo deseas puedes consultar el archivo secreto o a los humanos que laboren en ese sector y que conozcan del tema.
            <br><br>
            La forma de presentar los hallazgos recolectados es completamente libre pero recuerda que entre más conozcas mayor será tu capacidad para entender la problemática.
            <br>
            Elige el tipo de archivo que quieres cargar cómo respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
            <br><br>
            Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.


			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 10,
            'question_type_id' => 1,
            'question' => '
            Localiza a través de la web, o haciendo un recorrido por tu comunidad, un hospital o clínica del sector público y otra del sector privado que estén cerca de tu vivienda, que consideres podrías visitar.
            <br><br>
            Comparte tu respuesta en el espacio destinado para ello.
            <br><br>
            ¿Cuáles son los hospitales que decidiste visitar y por qué?
            <br><br>
            Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 11,
            'question_type_id' => 5,
            'question' => '
            Esta es la parte más emocionante de la misión:  visitar los hospitales o clínicas que seleccionaste.                                                     ¡Recuerda que por seguridad debes ir acompañado de un humano mayor de edad!
            <br><br>
            Permanece al menos una hora en cada hospital y explora las diferentes áreas a las que puedes tener acceso, por ejemplo el área común, el área de visitas, la cafetería e incluso la entrada o los alrededores del hospital donde muchas veces permanecen los familiares de los pacientes. Si tienes la posibilidad de platicar con doctores, pacientes o familiares ¡aprovéchalo! Pídeles que te compartan sus experiencias. Éstas nos aportarán mucho sobre lo que sucede ahí adentro.
            <br><br>
            Identifica los principales beneficios y/o carencias en ambos hospitales, las demandas frecuentes, la capacidad de respuesta del personal humano que labora (secretarias, enfermeras, médicos, etc) así como las actitudes y necesidades que tienen los humanos que los visitan.
            <br><br>
            Pon a prueba tu creatividad y comparte tu experiencia a través de una presentación, un documento de texto o un video. Describe cómo te sentiste, qué descubriste, qué sientes que te faltó conocer, o cualquier cosa que creas que es necesario compartir. ¿Qué consideras  que debería cambiar en el Sistema de Salud para garantizar el derecho a la salud de los humanos?
            <br><br>
            El formato a través del cual elijas hacerlo es tu decisión, puede ser uno o más archivos dependiendo de lo que hayas realizado. No es necesario que utilices todos.
            <br><br>
            Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 12,
            'question_type_id' => 1,
            'question' => '
            ¡Excelente Marvin!
            <br><br>
            Para concluir, lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello..
            <br><br>
            ¿Qué obstáculos enfrentaste para el desarrollo del reto?
            <br><br>
            ¿Cómo los resolviste y qué sentiste al lograrlo?
            <br><br>
            Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 13,
            'question_type_id' => 1,
            'question' => '
            Empezaremos por identificar una zona que sufra la falta de abastecimiento de agua. Ubica una cerca de tu lugar de residencia y haz una lista de preguntas que te permitan explorar sobre el problema, sus causas y consecuencias.
            <br><br>
            Ingresa a la web o consulta con humanos de tu comunidad para que sepas en dónde está. Revisa estadísticas, busca noticias sobre ésta y ya que la tengas ubicada, explora un poco más sobre sus características y condiciones. No te diré lo que debes hacer, pero te daré algunos tips que podrán ayudarte:
            <br><br>
            Considerando lo que exploraste, lee con atención las siguientes preguntas y coloca tu respuesta en el espacio de la plataforma destinado para ello.
<br><br>

1. ¿Cuál es el nombre de la comunidad que visitarás?

<br><br>

2. ¿A cuántos kilómetros se encuentra  de donde tú estás?

<br><br>

3. ¿Por qué elegiste esa comunidad? ¿Qué criterios consideraste?
<br><br>

Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.



			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 14,
            'question_type_id' => 3,
            'question' => '
            Ahora que ya sabemos un poco más sobre la comunidad y los problemas de agua que enfrenta, dirígete al lugar y observa de cerca lo que sucede. Interactúa con sus habitantes para que te compartan su experiencia. No olvides que para realizar la visita debes ir acompañado de un humano mayor de edad, es sumamente importante por seguridad.
<br><br>
Puedes complementar tu exploración consultando noticias, videos o informes sobre la comunidad.
No olvides que en el archivo secreto y/o en la web puedes encontrar información.
<br><br>
Analiza y organiza los hallazgos que recopilaste y compártelos en un video, una presentación gráfica o cualquier recurso que te permita  incluir:
<br><br>
a. Una descripción de lo que observaste e indagaste.
b. La situación que describieron los humanos de esa comunidad
c. ¿Qué fue lo que más te impactó?
d. ¿Qué solución propondrías para resolver el problema de la comunidad?
<br><br>
Elige el tipo de archivo que quieres cargar como respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.


<br><br>


Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 15,
            'question_type_id' => 1,
            'question' => '
            ¡Excelente trabajo Marvin! No cabe duda, ¡eres un gran explorador!
Para finalizar la misión , lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello.
<br><br>
1. ¿Qué te pareció esta misión?
<br><br>
2. ¿Qué fue lo más difícil para ti?
<br><br>
3. ¿Cómo lo resolviste?
<br><br>
4. ¿Los retos de esta misión fueron fáciles o difíciles?
<br><br>
5. ¿Por qué?
<br><br>
6. ¿Qué aprendiste  a lo largo de los retos?
<br><br>
Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 16,
            'question_type_id' => 1,
            'question' => '
				3. ¿Por qué elegiste esa comunidad? ¿Qué criterios consideraste?
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 17,
            'question_type_id' => 5,
            'question' => '
				Ahora que ya sabemos un poco más sobre la comunidad y los problemas de agua que enfrenta, dirígete al lugar de manera que puedas observar de cerca lo que sucede e interactuar con sus habitantes para que te compartan su experiencia. No olvides que para realizar tu exploración debes ir acompañado de un humano mayor de edad, es sumamente importante por seguridad.
				<br><br>
				Puedes complementar tu exploración consultando noticias, videos o informes sobre la comunidad y de esta forma ampliar nuestro conocimiento sobre las causas y consecuencias de la falta de agua. No olvides que en el archivo secreto y/o en la web puedes encontrar información.
				<br><br>
				Analiza y organiza los hallazgos que recopilaste y compártelos  a través de un reporte elaborado con un video, una presentación gráfica o cualquier recurso que te permita  incluir:
				<br><br>
				a. Una descripción de lo que observaste e indagaste
				<br>
				b. La situación que describieron los humanos de esa comunidad
				<br>
				c. ¿Qué fue lo que más te impactó?
				br
				d. ¿Qué solución propondrías para resolver el problema en esta comunidad?
				<br><br>
				Elige el tipo de archivo que quieres cargar cómo respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 18,
            'question_type_id' => 1,
            'question' => '
				¡Excelente trabajo Marvin! No cabe duda, ¡eres un gran explorador!
				<br><br>
				Para finalizar la misión , lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				¿Qué te pareció esta misión?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 19,
            'question_type_id' => 1,
            'question' => '
				¿Qué fue lo más difícil para ti?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 20,
            'question_type_id' => 1,
            'question' => '
				¿Cómo lo resolviste?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 21,
            'question_type_id' => 1,
            'question' => '
				¿Los retos de esta misión fueron fáciles o difíciles para ti?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 22,
            'question_type_id' => 1,
            'question' => '
				¿Por qué?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 23,
            'question_type_id' => 1,
            'question' => '
				¿Qué aprendiste  a lo largo de los retos?
				<br><br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 24,
            'question_type_id' => 1,
            'question' => '
				Te invito a revisar el material enlistado, que se encuentra en el archivo secreto. Realiza anotaciones sobre los datos que más te llamen la atención o te sorprendan y escribe los cuestionamientos que te surjan sobre el tema.
				<br><br>
				A. Vanguardia, “La razón por la que no deberían existir vagones exclusivos para mujeres”, Vanguardia. Te sugerimos ver los videos sobre el tema que se incluyen como parte de la noticia.
				<br>
				B. Santibañez, L. “Vagones exclusivos para mujeres: la medida contra el acoso en el metro que genera controversia.” El mostrador.
				<br><br>
				Siempre que leemos, es importante reflexionar y analizar los hallazgos, cuestionar e indagar sobre aquello que nos interesa o nos llama la atención. Lee con atención el siguiente planteamiento y coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				A partir de lo que leíste ¿a qué conclusiones llegaste? ¿Qué cuestionamientos te surgieron al respecto?
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 25,
            'question_type_id' => 10,
            'question' => '
				Considerando todo lo que has explorado, responde las siguientes preguntas:
				<br><br>
				El hecho de que existan medidas como la separación de hombres y  mujeres en el metro, ¿forma parte de una cultura igualitaria? Selecciona tu respuesta.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 26,
            'question_type_id' => 1,
            'question' => '
				¿Por qué?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 27,
            'question_type_id' => 10,
            'question' => '
				Es momento de consultar nuevamente en el archivo secreto el reportaje de Atracción 360. “Por esto no deberían existir vagones exclusivos para mujeres”. No olvides reproducir el video que se incluye como parte de la nota.
				<br><br>
				¿Esta información te hizo cambiar de opinión con respecto a tu respuesta en el reto anterior? Selecciona tu respuesta.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 28,
            'question_type_id' => 1,
            'question' => '
				¿Por qué?
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 29,
            'question_type_id' => 5,
            'question' => '
				Integra todos los hallazgos obtenidos en tu exploración. Reflexiona al respecto y concluye con una propuesta. Guíate por las siguientes preguntas y formula otras que te hayan surgido. Cuéntanos a través de un video o una presentación.
				<br><br>
				A. ¿Cuáles consideras que son los principales problemas de desigualdad de género existentes en tu entorno?
				<br><br>
				B. ¿Qué estrategias propondrías para promover la cultura de la igualdad de género en tu contexto? Piensa en ideas realistas que puedan aplicarse.
				<br><br>
				Elige el tipo de archivo que quieres cargar cómo respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 30,
            'question_type_id' => 5,
            'question' => '
				¡Es momento de contagiar tu entusiasmo por aportar un granito de arena a la sociedad!
				<br><br>
				1. Reúnete con tu grupo de amigos o familiares y expón tus propuestas del reto anterior. Piensen en conjunto cuál de esas les gustaría implementar.
				<br>
				2. Elijan una y elaboren un plan de acción. Para hacerlo piensen en lo que necesitan para implementar la estrategia. Puedes consultar mi caja de preguntas para conocer algunas ideas.
				<br>
				3. Una vez definido el lugar y la forma en que implementarán la estrategia, ¡es momento de actuar! Es muy importante que registres todos tus hallazgos (acciones y reacciones de los humanos) a través de imágenes, videos y/o una bitácora.
				<br>
				4. Al concluir la implementación de la estrategia, reflexiona sobre lo siguiente:
				<br>
				- ¿Qué funcionó y qué falló?
				<br>
				- ¿Cuál fue la reacción de los humanos?
				<br>
				- Identifica los patrones que comparten los humanos que participaron.
				<br>
				¿Qué sentimientos se generaron en ti al implementar la estrategia?
				<br><br>
				Es muy importante que registres todas las evidencias posibles. Deben ser parte de la experiencia. Utiliza fotografías, videos, audios y toma notas; posteriormente integra los hallazgos y compártelos.
				<br><br>
				Elige el tipo de archivo que quieres cargar cómo respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 31,
            'question_type_id' => 1,
            'question' => '
				Lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				Cuéntanos…
				<br>
				¿Qué fue lo que hiciste, cómo implementaste la estrategia y qué sucedió antes, durante y después de hacerlo?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 32,
            'question_type_id' => 1,
            'question' => '
				¿Qué obstáculos tuviste, cómo los enfrentaste y cómo te sentiste?
				<br><br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 33,
            'question_type_id' => 1,
            'question' => '
				Es momento de explorar el fenómeno de la violencia, sus causas y consecuencias. Puedes hacerlo a través de mi archivo secreto y/o consultando hallazgos en la web.
				<br><br>
				Lee con atención y coloca tu respuesta en el espacio de la plataforma destinado para ello:
				<br><br>
				Empieza por plantear los cuestionamientos que te permitan tener suficientes hallazgos para elaborar una política pública orientada a erradicar la violencia. Posteriormente busca respuestas a esos cuestionamientos. Recuerda que puedes hacer uso de la  caja de preguntas y del archivo secreto para encontrar algunas ideas!
				<br><br>
				Preguntas clave:
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 34,
            'question_type_id' => 1,
            'question' => '
				Ideas clave:
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 35,
            'question_type_id' => 8,
            'question' => '
				Ahora que ya conoces a fondo los problemas de violencia, es momento de diseñar una política pública que integre estrategias que permitan reducir los índices de violencia existentes. Es muy importante que cuides la redacción de la misma así como las estrategias propuestas, pues próximamente la presentaremos a las autoridades.
				<br><br>
				Envía tu propuesta a través del buzón del Congreso, exponiendo una breve presentación. Utiliza imágenes, audio y texto para tu presentación.
				<br><br>
				Una vez que concluyas con la actividad, guarda tu archivo en formato PDF y súbelo en el espacio de la plataforma destinado para ello. Verifica que tu archivo no rebase los 20 MB, de lo contrario no podrás cargarlo.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 36,
            'question_type_id' => 1,
            'question' => '
				Lee con atención la siguiente información y coloca tu respuesta en el espacio de la plataforma destinado para ello.
				<br><br>
				Para concluir este reto y la misión,  compártenos tu opinión sobre lo que has desarrollado, si te ha gustado el reto, por qué, cómo te sentiste al elaborarlo, qué obstáculos se te presentaron y cómo lograste superarlos.
				<br><br>
				Escribe tu reflexión en el espacio señalado.
				<br><br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 37,
            'question_type_id' => 1,
            'question' => '
				Imagina que eres el Director de una escuela. Puedes decidir el nivel (primaria, secundaria, preparatoria), el sector (público o privado) y la zona (rural o urbana). Has recibido una carta de la Secretaría de Educación en la que te informan que se asignará presupuesto para invertir en recursos humanos y materiales con la finalidad de que tu institución cuente con las condiciones idóneas para operar.
				<br><br>
				Lo primero que debes hacer es preguntarte qué necesidades tiene la escuela que diriges. Para ello, realiza una  exploración, haciendo uso del archivo secreto y/o de la web, para conocer cuáles son los principales necesidades que enfrentan las escuelas hoy en día, cuáles son las tendencias educativas, y todas las preguntas que se te ocurran. Si lo deseas puedes consultar a amigos o familiares sobre su experiencia y requerimientos.
				<br><br>
				Una vez que hayas definido los requerimientos de tu escuela coloca tu respuesta en el espacio destinado para ello. Deberás justificar cada uno ellos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 38,
            'question_type_id' => 1,
            'question' => '
				Ahora es momento de que decidas. Lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				¿Dónde se ubica tu escuela?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 39,
            'question_type_id' => 1,
            'question' => '
				¿A qué sector pertenece? (Público, privado)
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 40,
            'question_type_id' => 1,
            'question' => '
				¿Qué nivel educativo atiende? (Preescolar, primaria, secundaria, preparatoria, universidad)
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 41,
            'question_type_id' => 1,
            'question' => '
				¿Qué características tienen tus alumnos?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 42,
            'question_type_id' => 1,
            'question' => '
				¿Qué características tienen tus maestros?
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 43,
            'question_type_id' => 1,
            'question' => '
				Ahora que describiste las condiciones de tu institución y lo que requiere, realiza un dibujo o esquema con tu escuela ideal.
				<br><br>
				¿Cómo te la imaginas? ¿Qué quieres que tenga esta escuela? Incluye una breve explicación de cómo los elementos de tu escuela ideal ayudarán a erradicar los problemas identificados.
				<br><br>
				Una vez que concluyas con la actividad, guarda tu archivo en formato PDF y súbelo en el espacio de la plataforma destinado para ello. Verifica que tu archivo no rebase los 20 MB, de lo contrario no podrás cargarlo.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 44,
            'question_type_id' => 1,
            'question' => '
				Lee con atención las siguientes preguntas y coloca tu respuesta en el espacio de la plataforma destinado para ello.
				<br>
				¡Excelente Marvin! para finalizar ¡cuéntame!
				<br>
				¿Cuál fue tu experiencia? ¿Qué sentimientos experimentaste?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 45,
            'question_type_id' => 1,
            'question' => '
				¿Qué fue lo más difícil para ti? ¿Cómo lo resolviste?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 46,
            'question_type_id' => 1,
            'question' => '
				¿Te gustó esta misión? ¿Por qué?
				<br> <br>
				¡Gran trabajo!
				<br> <br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 47,
            'question_type_id' => 1,
            'question' => '
				Para iniciar debes tener más claridad sobre lo que es una ciudad sostenible, por eso te invito a encontrar hallazgos que te ayuden a conocer más acerca del tema y así lograr que tu ciudad sostenible sea realmente un ejemplo.
				<br><br>
				¿Qué necesitas saber para lograr tu objetivo?
				<br><br>
				Piensa una serie de preguntas que te sirvan como apoyo en la construcción de tu ciudad y coloca tu respuesta en el espacio destinado para ello. Puedes consultar la caja de preguntas, buscar en la web o recurrir a la ayuda de humanos expertos que tengas cerca.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 48,
            'question_type_id' => 3,
            'question' => '
				Ahora es momento de dar respuesta a tus preguntas. Para hacerlo, puedes ocupar el archivo secreto o consulta en la web.
				<br>
				Una vez que tengas suficiente información, organízala de tal forma que puedas visualizarla y comprenderla fácilmente. Puede ser un mapa, un esquema, una lluvia de ideas o cualquier recurso que te ayude a tener clara tu idea.
				<br><br>
				Guarda tu archivo en formato PDF y súbelo en el espacio destinado para ello. Verifica que tu archivo no rebase los 20 MB, de lo contrario no podrás cargarlo.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        // Duda 2 question_type. Presentación pag 83
        Questions_Challenge::create([
            'challenge_id' => 49,
            'question_type_id' => 5,
            'question' => '
				Muy bien Marvin, ha llegado la hora de imaginar cómo sería tu ciudad sostenible.
				<br><br>
				1. Represéntala a través de un dibujo, una maqueta, un video, un collage, etc. Utiliza el material de apoyo que mejor te convenga.
				<br>
				2. Describe sus características en el espacio de la plataforma destinado para ello, qué problemas resuelve y de qué manera mejorará la vida de los humanos que viven en ella.
				<br><br>
				Elige el tipo de archivo que quieres cargar cómo respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 50,
            'question_type_id' => 1,
            'question' => '
				¡Eres un excelente arquitecto Marvin! Pero estoy seguro de que para lograrlo pasaste por diferentes momentos.
				<br>
				Lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				¿Cuál fue tu experiencia? ¿Qué sentimientos experimentaste?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 51,
            'question_type_id' => 1,
            'question' => '
				¿Qué fue lo más difícil para ti? ¿Cómo lo resolviste?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 52,
            'question_type_id' => 1,
            'question' => '
				¿Te gustó esta misión? ¿Por qué?
				<br><br>
				¡Gran trabajo!
				<br><br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 53,
            'question_type_id' => 1,
            'question' => '
				Imagina que te invitan a un viaje pero el lugar es totalmente desconocido para ti, ¿qué meterías en tu maleta?
				<br>
				¡Hmmm! ¿Es difícil decirlo verdad?
				<br><br>
				Con el objetivo de que esto no te pase en la expedición a la que estás a punto de salir, te pido que revises los elementos del archivo secreto acerca del sector industrial y si lo consideras necesario explores sobre el tema en la web.
				<br><br>
				Pregúntate qué es lo que deberías conocer antes de adentrarte en este campo y busca las respuestas. Recuerda que lo más importante en este momento es conocer los principales problemas que se presentan en la industria y que afectan al ambiente. Organiza como tú decidas todos los hallazgos que encontraste y te llamaron la atención. Comparte los resultados de tu exploración en el espacio destinado para ello.
				<br><br>
				Si necesitas ayuda, en la caja de preguntas  podrás encontrar pistas que te servirán de inspiración..
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        // Duda pag 90
        Questions_Challenge::create([
            'challenge_id' => 54,
            'question_type_id' => 1,
            'question' => '
				¡Bien Marvin! Ahora que ya conoces el problema, te invito a elaborar una serie de cuestionamientos que te ayuden a identificar qué es lo que debes observar durante tu visita a una industria y que no se te escape ningún detalle.
				<br>
				Para formularlas, utiliza las preguntas de la izquierda y las palabras de la derecha como referencia. Por ejemplo: ¿Qué tipo de residuos se generan? Recuerda que no importa cuántas preguntas formules. Lo que cuenta es su consistencia y que te permitan obtener hallazgos valiosos.
				<br><br>
				¡Muéstrame tu destreza con las palabras Marvin!
				<br><br>
				Estructura tus preguntas y colócalas en el espacio destinado para ello.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 55,
            'question_type_id' => 1,
            'question' => '
				¡Me encanta que hayas aceptado la misión Marvin!
				<br><br>
				Ahora que ya tienes hallazgos suficientes, cuéntanos qué industria visitarás y por qué la has elegido. Coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				Teniendo claro el lugar a donde vas, es importante que pienses en el humano adulto que te acompañará. Si ya estás listo, llegó el momento de hacer un recorrido por la zona industrial que elegiste.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 56,
            'question_type_id' => 5,
            'question' => '
				Ha llegado el momento de realizar una observación detallada de la empresa o empresas que se encuentran en la zona y determina a qué sector de la industria pertenecen. No olvides tomar en cuenta las preguntas que formulaste y, si te es posible, platica con los colaboradores sobre su impacto ambiental.
				<br><br>
				Ya que tengas hallazgos suficientes, regresa a casa y realiza un reporte sobre estos. Considera cuáles son los contaminantes que arrojan los diferentes tipos de empresas y qué medidas preventivas pueden o podrían  llevar a cabo para la conservación del ambiente. La manera en que presentarás el informe es totalmente libre. Puedes recurrir a videos, fotografías, un escrito, una presentación.
				<br><br>
				Elige el tipo de archivo que quieres cargar cómo respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				¡Sorpréndenos Marvin!
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 57,
            'question_type_id' => 1,
            'question' => '
				¡Excelente trabajo Marvin! No cabe duda de que eres un gran explorador.
				<br>
				Para finalizar la misión comparte tu experiencia contestando las siguientes preguntas en el espacio indicado:
				<br><br>
				¿Qué te pareció esta misión?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 58,
            'question_type_id' => 1,
            'question' => '
				¿Qué fue lo más difícil?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 59,
            'question_type_id' => 1,
            'question' => '
				¿Cómo lo resolviste?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 60,
            'question_type_id' => 1,
            'question' => '
				¿Los retos de esta misión te parecieron  fáciles o difíciles?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 61,
            'question_type_id' => 1,
            'question' => '
				¿Por qué?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 62,
            'question_type_id' => 1,
            'question' => '
				¿Cómo te sentiste a lo largo de los retos?
				<br><br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 63,
            'question_type_id' => 1,
            'question' => '
				Para tener una entrevista exitosa realiza una exploración sobre la situación laboral en el Mundo Be. Puedes apoyarte en el material que se encuentra en el archivo secreto, o bien buscar datos en la web.
				<br><br>
				Es muy importante que te concentres en el objetivo. Para ello elabora preguntas de partida.
				<br><br>
				No te preocupes Marvin, recuerda que siempre tengo pistas para ti. Si necesitas ayuda puedes revisar la caja de preguntas.
				<br><br>
				Comparte tus ideas en el espacio asignado para ello; preguntas y respuestas o únicamente las conclusiones de lo que exploraste.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 64,
            'question_type_id' => 1,
            'question' => '
				Ahora que conoces más acerca del tema, ha llegado el momento de diseñar tus entrevistas con base en lo que averiguaste y lo que te gustaría saber sobre la  experiencia laboral de tus entrevistados. Recuerda que las preguntas están enfocadas a diferentes humanos que tienen diferentes perspectivas. Elabora una serie de preguntas y decide a quien le corresponde contestar: al jefe o al colaborador.
				<br>
				¡Vamos, inspírate y redacta tus entrevistas!
				<br><br>
				Coloca tus entrevistas en el espacio de la plataforma destinado para ello y sepáralas  por entrevistado. Si tienes dudas sobre cómo realizar una entrevista consulta la caja de preguntas o haz una búsqueda en la web.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 65,
            'question_type_id' => 5,
            'question' => '
				¡Adelante Marvin, es tu momento de brillar como un as de la entrevista!
				<br>
				Coordina una cita con los humanos que vas a visitar. Pide a un humano adulto que te acompañe cuando vayas a realizar la reunión. ¡No lo olvides!
				<br>
				Las herramientas que desees usar son bienvenidas siempre y cuando sean útiles para elaborar tu reporte. Puedes elaborar un documento escrito, un video o un audio de la entrevista, fotografías o cualquier otro recurso que tengas al alcance.
				<br><br>
				Elige el tipo de archivo que quieres cargar como respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 66,
            'question_type_id' => 5,
            'question' => '
				¡Me encanta que seas mi compañero de búsqueda!
				<br>
				Es momento de compartir  las conclusiones a las que  llegaste. Cuéntanos lo que exploraste y te sorprendió, lo que te pareció muy difícil y los sentimientos que experimentaste, qué cambiarías para mejorar las condiciones de los trabajadores del lugar, y todo lo que se te haya ocurrido a partir de la reflexión y el análisis de los hallazgos.
				<br>
				Recuerda que tienes la  libertad de decidir cómo presentarlas. Estoy seguro de que tomarás la mejor decisión. ¡Sorpréndenos!
				<br><br>
				Elige el tipo de archivo que quieres cargar como respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 67,
            'question_type_id' => 1,
            'question' => '
				Marvin, me encanta tu sentido de responsabilidad social.
				<br>
				En los próximos días será la sesión en el Congreso y los temas a debatir son los siguientes:
				<br><br>
				a. Aprobación de  la Reforma Energética. ¿Tu voto será a favor o en contra?
				<br>
				b. Asignación de recursos para la construcción de dos refinerías como parte del presupuesto para el próximo año. El gobierno de Mundo Be asegura que es sumamente necesaria su construcción. ¿Estás de acuerdo en asignar recurso para ese fin? ¿Cuánto asignarías?
				<br><br>
				Prepárate para argumentar tus respuestas. ¿Cuánto sabes del tema?, ¿qué necesitas saber antes de emitir tu voto? Elabora una lista de preguntas necesarias antes de votar. Si lo deseas puedes consultar la caja de preguntas para obtener ideas. Mientras más preguntas generes más elementos tendrás para decidir y defender tu voto.
				<br><br>
				Ya que tengas listas tus preguntas, busca las respuestas. Te invito a consultar el archivo secreto o la web para encontrarlas. Coloca tus principales hallazgos en el espacio destinado para ello.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 68,
            'question_type_id' => 3,
            'question' => '
				Con los hallazgos que has obtenido puedes iniciar una revisión profunda acerca de las ventajas y desventajas de las dos propuestas.
				<br>
				¡Hey Marvin! Es hora de poner las cosas sobre la balanza. Realiza un cuadro comparativo exponiendo ambas propuestas para  tener una visión más clara antes de tomar una decisión.
				<br><br>
				Guarda tu archivo en formato PDF y súbelo en el espacio destinado para ello. Verifica que tu archivo no rebase los 20 MB, de lo contrario no podrás cargarlo.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 69,
            'question_type_id' => 1,
            'question' => '
				Hasta ahora parece que todo va bien, pero….
				<br>
				Necesito que te asegures de que tu decisión sea la mejor y para  ello es importante que pienses en algunos argumentos que la orienten.
				<br>
				Escribe dos argumentos a favor y dos en contra de la Reforma Energética:
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 70,
            'question_type_id' => 1,
            'question' => '
				Escribe dos argumentos a favor y dos en contra sobre la construcción de refinerías:
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 71,
            'question_type_id' => 10,
            'question' => '
				Marvin ha llegado el día de emitir tu voto, tendrás que argumentar la defensa de tu postura.
				<br>
				Primera sesión de votación.
				<br><br>
				1. En relación con  la aprobación de la Reforma Energética ¿tu voto será a favor o en contra? Selecciona “sí”en caso de que tu voto sea a favor o “no” si tu voto es en contra.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 72,
            'question_type_id' => 1,
            'question' => '
				2. Defiende tu respuesta escribiendo tus argumentos en el espacio destinado para ello.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 73,
            'question_type_id' => 5,
            'question' => '
				Segunda sesión de votación.
				<br><br>
				1. Dentro del presupuesto para el próximo año se está solicitando asignar recursos para la construcción de dos refinerías. El Gobierno de Mundo Be argumenta que es sumamente necesaria su construcción. ¿Estás de acuerdo en asignar recursos para ese fin? Selecciona “sí” en caso de que tu voto sea a favor o “no” si tu voto es en contra.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 74,
            'question_type_id' => 1,
            'question' => '
				2. ¿Cuánto asignarías?  Coloca tu respuesta en el espacio destinado.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 75,
            'question_type_id' => 1,
            'question' => '
				3. Defiende tu respuesta escribiendo tus argumentos en el espacio destinado.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 76,
            'question_type_id' => 2,
            'question' => '
				Para concluir Marvin, graba un breve video en el que compartas:
				<br><br>
				a. ¿Cuál es tu opinión sobre este reto? ¿Qué fue lo que más te gusto y lo que menos te gustó?
				<br>
				b. ¿Cuáles fueron las principales dificultades que enfrentaste para resolverlo? ¿Cómo las enfrentaste?
				<br>
				c. ¿Cómo te sentiste?
				<br><br>
				Realiza tu video y una vez que lo termines cárgalo en tu cuenta de YouTube. Inserta la liga en el espacio asignado.
				<br><br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 77,
            'question_type_id' => 1,
            'question' => '
				Seguramente estás pensando por dónde empezar.
				<br>
				Lo primero que debes hacer es preguntarte qué tanto sabes acerca de la separación de basura. Elabora una lista de cuestionamientos que te permitan entender cómo funciona y cuál es su importancia. Puedes apoyarte en la caja de preguntas si lo consideras necesario.
				<br>
				Ya que tengas tu cuestionario, apóyate en el archivo secreto y en la web para buscar información y entender un poco más sobre este problema.
				<br>
				Escribe tus principales aprendizajes en el espacio indicado.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 78,
            'question_type_id' => 5,
            'question' => '
				Ahora que ya conoces más sobre la separación de la basura, observa cómo la organizan en tu casa y en la de dos o tres vecinos o familiares.  Puedes observar sus botes de basura y/o preguntarles a los que viven en la casa. Utiliza el medio que prefieras para capturar tus evidencias. Puedes grabar un video, tomar fotografías de los basureros o describir en una libreta o en tu celular lo que observaste.
				<br><br>
				Elige el tipo de archivo que quieres cargar como respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos. Comparte las evidencias de tu exploración.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 79,
            'question_type_id' => 2,
            'question' => '
				A partir de tu exploración en casa y comunidad responde las siguientes preguntas:
				<br><br>
				a. ¿Cuáles son las similitudes para organizar la basura en las casas que visitaste?
				<br>
				b. ¿Cuáles son las diferencias para organizar la basura en las casas que visitaste?
				<br>
				c. ¿Cuántas bolsas de basura generan en una semana? ¿Cuántos humanos viven en la casa?
				<br>
				d. ¿La forma en que organizan la basura contribuye al cuidado del medio ambiente?
				<br>
				e. ¿La forma en que organizan la basura contribuye al cuidado del medio ambiente?
				<br><br>
				Comparte tus respuestas a través de una transmisión en You Tube. Inserta la liga en el espacio destinado para ello.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 80,
            'question_type_id' => 1,
            'question' => '
				Estoy impresionado con tu trabajo.
				<br><br>
				Para finalizar, lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				Cuéntanos ¿qué obstáculos enfrentaste durante el desarrollo de la misión?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 81,
            'question_type_id' => 1,
            'question' => '
				¿Cómo te sentiste después de haberlos superado?
				<br><br>
				Seguramente tu resultado te hace sentir tan orgulloso de ti, tanto como yo lo estoy. Me encanta tu sentido de compromiso y responsabilidad.
				<br><br>
				¡Nos vemos en nuestra próxima aventura!
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 82,
            'question_type_id' => 3,
            'question' => '
				En este primer reto deberás realizar un registro de todas las actividades de tu día y evidenciar a través de imágenes dos cosas:
				<br>
				a. Todos los recursos renovables y no renovables que utilizas en cada una de tus actividades. Por ejemplo, luz, agua, una botella, un vaso de unicel, etc.
				<br>
				b. Los cambios de temperatura que se presenten a lo largo del día.
				<br>
				El registro debes hacerlo durante una semana completa. ¿Listo?
				<br>
				¡Aquí vamos! Iniciemos con tu registro Marvin.
				<br><br>
				Elabora un collage con fotografías que vayas tomando, con tu celular o tu cámara, de cada cosa que consumas o que reflejen los cambios de temperatura.
				<br><br>
				Guarda el collage en formato PDF y súbelo en el espacio de la plataforma destinado para ello. Verifica que tu archivo no rebase los 20 MB, de lo contrario no podrás cargarlo.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 83,
            'question_type_id' => 2,
            'question' => '
				Comencemos con los recursos. De momento puedes olvidarte de los cambios de temperatura. Copia el cuadro que te mostramos en un archivo de word y clasifica los recursos que enlistaste en el reto anterior.  Una vez que concluyas, guarda en PDF tu archivo y compártelo en el espacio asignado para ello.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 84,
            'question_type_id' => 1,
            'question' => '
				Ahora, responde:
				<br>
				¿Cuáles de estos desechos se pueden reciclar?, ¿Cuántos reciclas?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 85,
            'question_type_id' => 1,
            'question' => '
				¿Cuáles de estos desechos se pueden reusar? ¿Cuántos vuelves a usar?
				<br><br>
				Si tienes dudas sobre los conceptos puedes revisar el archivo secreto o consulta en la web.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 86,
            'question_type_id' => 1,
            'question' => '
				Ahora que has identificado los recursos que más consumes, piensa entre 3 y 5  estrategias que podrías implementar para reducir el uso y/o consumo de aquellas cosas que generan basura.
				<br>
				Colócalas en el espacio indicado y explica brevemente en qué consisten.
				<br><br>
				¡Excelente! Te recomiendo ponerlas en práctica y compartirlas  a través de tus redes sociales para hacer este fenómeno viral.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 87,
            'question_type_id' => 1,
            'question' => '
				Vamos muy bien Marvin. Ahora retomemos tus hallazgos sobre la variación del clima. Lee con atención las siguientes preguntas y coloca tu respuesta en el espacio destinado para ello.
				<br><br>
				¿Cuántos cambios de temperatura se manifestaron durante la semana?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 88,
            'question_type_id' => 1,
            'question' => '
				¿Cuántos cambios de temperatura se manifestaron en promedio durante un día?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 89,
            'question_type_id' => 1,
            'question' => '
				¿A qué se deben los cambios de temperatura presentados durante el día y la semana? ¿Hay algún fenómeno natural que los esté provocando? ¿Está relacionado con las estaciones del año?
				<br><br>
				Si lo requieres, puedes consultar el archivo secreto o la web para conseguir más hallazgos sobre los cambios de temperatura.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 90,
            'question_type_id' => 1,
            'question' => '
				¡Muy bien Marvin!
				<br>
				Para finalizar nuestra misión, necesito que me ayudes contestando los siguientes enunciados.
				<br><br>
				El reto más difícil fue…
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 91,
            'question_type_id' => 1,
            'question' => '
				Cuando lo resolví me sentí…
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 92,
            'question_type_id' => 1,
            'question' => '
				Lo que me gustó fue…
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 93,
            'question_type_id' => 1,
            'question' => '
				Al terminar la misión me sentí...
				<br> <br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 94,
            'question_type_id' => 1,
            'question' => '
				Al terminar la misión me sentí...
				<br> <br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 95,
            'question_type_id' => 1,
            'question' => '
				Lo primero que debes hacer es indagar sobre las preguntas que aparecen a continuación. Respóndelas en el espacio indicado.
				<br><br>
				Para resolver estas preguntas te aconsejo seguir los siguientes pasos:
				<br>
				1. Elaborar una lista de preguntas que sería importante responder antes de enfrentar este reto.
				<br>
				2. Busca las respuestas a las preguntas en el archivo secreto o en la web. También puedes entrevistar a humanos que habiten en  la zona.
				<br>
				3. Considerando los hallazgos encontrados, elabora tus respuestas.
				<br><br>
				1. ¿Qué ecosistemas rodean la ciudad dónde vives?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 96,
            'question_type_id' => 1,
            'question' => '
				2. ¿Cuál era el ecosistema de la ciudad donde actualmente se encuentra tu casa?
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 97,
            'question_type_id' => 5,
            'question' => '
				Marvin, como pudiste darte cuenta, con el paso del tiempo los paisajes han cambiado. Sin embargo, tienes la fortuna de contar con humanos a tu alrededor que han sido testigos de ello y pueden platicarte su experiencia.
				Acércate a algunos que hayan vivido en la zona durante los últimos 5 a 15 años y te puedan compartir datos sobre cómo ha cambiado el ecosistema de la zona y cómo es que esto los ha afectado. Pregúntales, por ejemplo, si se han experimentado cambios bruscos de temperatura, si han desaparecido especies animales, si las personas se enferman más, si han cambiado sus hábitos, si hay más o menos árboles, más casas y centros comerciales o cualquier otro hallazgo que puedas obtener con  respecto a la manera en que  la alteración de los ecosistemas afecta  al ambiente.
				Registra tus hallazgos a través de un video, de imágenes, de  notas, de una grabación de audio, o de cualquier otro recurso que se te ocurra para reunir las evidencias.
				<br><br>
				Elige el tipo de archivo que quieres cargar como respuesta a este reto. Puede ser uno o más dependiendo lo que hayas realizado. No es necesario que utilices todos.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 98,
            'question_type_id' => 5,
            'question' => '
				Concentra todos los hallazgos y realiza un análisis sobre los ecosistemas que te rodean, sus transformaciones y afectaciones.
				<br>
				Cuéntale al Mundo Be lo que encontraste.
				<br>
				Elabora un video para crear conciencia entre la población sobre cómo la alteración de los ecosistemas afecta nuestro entorno y compártelo.
				<br>
				Realiza tu video y una vez que lo termines cárgalo en tu cuenta de YouTube. Inserta la liga en el espacio asignado.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa. da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 99,
            'question_type_id' => 1,
            'question' => '
				Marvin, concluye esta misión contestando las siguientes preguntas:
				<br><br>
				¿Cuál fue tu mayor aprendizaje en el desarrollo de esta misión?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 100,
            'question_type_id' => 1,
            'question' => '
				¿Cuál fue tu mayor dificultad?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 101,
            'question_type_id' => 10,
            'question' => '
				Del 1 a 5 ¿Qué valor le asignas a tu desempeño en esta experiencia?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 102,
            'question_type_id' => 1,
            'question' => '
				¿Por qué?
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 103,
            'question_type_id' => 1,
            'question' => '
				¿Qué sentimientos experimentaste durante el desarrollo de la misión?
				<br><br>
				Gracias por tu aportación Marvin, ha sido de gran ayuda. ¡Hasta luego!
				<br><br>
				Una vez que concluyas da clic en el botón “Compartir mi experiencia” y obtén tu recompensa.
			',
            'required' => true
        ]);

        Questions_Challenge::create([
            'challenge_id' => 104,
            'question_type_id' => 1,
            'question' => '
				Como todo buen periodista deberás iniciar con una exploración. Entre más información tengas, mayor credibilidad tendrá tu nota.
				<br>
				Consulta diferentes fuentes, tanto en el archivo secreto como en la web, para responder cuestionamientos que te surjan sobre el tema. Puedes inspirarte en lo que encuentres en la caja de preguntas. Lo importante es que tengas suficientes hallazgos para resolver el reto.
				<br>
				Organiza las respuestas a los cuestionamientos planteados y compártelas en el espacio destinado para ello.
				<br><br>
				Una vez que concluyas da clic en el botón “Reto finalizado” y obtén tu recompensa.
			',
            'required' => true
        ]);
    }
}
