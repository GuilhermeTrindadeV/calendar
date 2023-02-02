<?php

namespace Src\App;

use Exception;
use DateTime;
use DateTimeZone;
use League\Plates\Engine;
use ReflectionClass;

use Src\Models\User;
use Src\Models\Event;
use Src\Exceptions\AppException;
use Src\App\Controller;

class Events extends Controller
{
    public function events()
    {

        echo $this->renderView("calendar", [
        ]); 
    }


    public function register(array $data)
    {
        $user = getUserSession();
        try {
            $data_start = str_replace('/', '-', $data['start']);
            $dbStart = date("Y-m-d H:i:s", strtotime($data_start));

            $data_end = str_replace('/', '-', $data['end']);
            $dbEnd = date("Y-m-d H:i:s", strtotime($data_end));
    
            $dbEvent = new Event();
            
            $dbEvent->setValues([
                "usu_id" => $user->id,
                "title" => $data["title"],
                "description" => $data["description"],
                "color" => $data["color"],
                "start" => $dbStart,
                "end" => $dbEnd
            ]);

            $dbEvent->save();
    
    
        $response = ['sit' => true, 'msg' => '<div class="alert alert-success" 
                role="alert">Evento cadastrado com sucesso '. $data['title'] .'!</div>'
            ];

            $response = ['sit' => true, 'msg' => '<div class="alert alert-danger" 
            role="alert">Erro ao cadastrar evento '.$data['title'].'!</div>'
        ];
        
        $_SESSION['msg'] = '<div class="alert alert-success" 
            role="alert">Evento cadastrado com sucesso ' . $data['title'] .'!</div>';
        } catch(Exception $e) {
            $response = [
                'sit' => true,
                'msg' => '<div class="alert alert-danger" 
                    role="alert">Erro ao cadastrar evento ' . $data['title'] . ' Erro: ' . $e->getMessage().'</div>'
            ];
        }

        header('Content-type: application/json');
        echo json_encode($response);
    }

    public function edit(array $data)
    {
        $user = getUserSession();
        try {

            $data_start = str_replace('/', '-', $data['start']);
            $dbStart = date("Y-m-d H:i:s", strtotime($data_start));

            $data_end = str_replace('/', '-', $data['end']);
            $dbEnd = date("Y-m-d H:i:s", strtotime($data_end));

            $dbEvent = Event::getOne([
                "eve_id" => $data['event_id']
            ]);
            $dbEvent->getValues();
            $this->getRoute("events.edit", [
                "event_id" => $data["event_id"]
            ]);

            $response = ['sit' => true, 'msg' => '<div class="alert alert-success" 
                    role="alert">Evento editado com sucesso '. $data['title'] .'!</div>'
                ];

                $response = ['sit' => true, 'msg' => '<div class="alert alert-danger" 
                role="alert">Erro ao editar evento '.$data['title'].'!</div>'
            ];
            
            $_SESSION['msg'] = '<div class="alert alert-success" 
                role="alert">Evento editado com sucesso ' . $data['title'] .'!</div>';
            } catch(Exception $e) {
                $response = [
                    'sit' => true,
                    'msg' => '<div class="alert alert-danger" 
                        role="alert">Erro ao editar evento ' . $data['title'] . ' Erro: ' . $e->getMessage().'</div>'
                ];
            }

            header('Content-type: application/json');
            echo json_encode($response);
    }

    public function list()
    {
        $jEvents = [];
        $events = Event::get();
        if($events) {
            foreach($events as $event) {
                $jEvents[] = $event->getValues();
            }
        }

        echo json_encode($jEvents);
    }
}