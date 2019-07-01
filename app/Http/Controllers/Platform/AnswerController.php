<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnswerRequest;
use App\Models\Levels\Challenges\Answer;
use App\Models\Logs\Action_Log;
use App\Models\Logs\Answer_Log;
use App\Models\Users\Be_Stat;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Storage;

class AnswerController extends Controller
{
    public function storeAnswer(StoreAnswerRequest $request)
    {
        //Para más versatilidad guardamos el request en una variabe
        $requestData = $request->all();

        $requestData['user_id'] = $this->user->id;

        // Verificamos si hay un file con nombre file_answer y si el archivo es válido
        if ($request->hasFile('file_answer') &&
            $request->file('file_answer')->isValid()) {

            //Asignamos el path
            $path = Answer::setPathFile($request->file_answer->extension(),$this->user->user_name);

            //Lo almacenamos en la carpeta del path

            $requestData['answer_file'] = Storage::putFileAs($path, new File($request->file_answer), basename($request->file_answer->getClientOriginalName())); //$request->file_answer->store($path);
        }

        //Guardamos el resultado sin importar si se está editando o creando
        $answer = Answer::saveAllDataAnswer($requestData, $this->user);

        //Si se guardó
        if ($answer['success']) {
            return [
                'success' => "Se ha guardado tu respuesta correctamente.",
                'showCompleteMissionModal' => $answer['completedData']['completedMission'],
                'challengeCompleted' =>  $answer['completedData']['completedChallenge'],
                'missionName' => 'Nombre de la misión',
                'nextMissionId' => 3,
                'updated' => $answer['updated'],
                'coins'=>$this->user->stats->coins,
                'points'=>$this->user->stats->exp_points
            ];
        }

        ///////////////////FALLA LA TRANSACCIÓN////////////////////
        ///////////Podemos mandar el error a un log//////////

        return response()->json([
            'errors' => 'Hubo un problema al guardar la pregunta'
        ], 200);
    }
}
