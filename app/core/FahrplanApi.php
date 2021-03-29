<?php


class FahrplanApi
{
    public function GetNextConnection($from, $to, $datetime)
    {
        $query = [
            'from' => $from,
            'to' => $to,
            'page' => 1,
            'limit' => 3,
        ];

        if ($datetime) {
            $query['date'] = date('Y-m-d', strtotime($datetime));
            $query['time'] = date('H:i', strtotime($datetime));
        }
        $url = 'http://transport.opendata.ch/v1/connections?' . http_build_query($query);
        $url = filter_var($url, FILTER_VALIDATE_URL);
        $response = json_decode(fetch($url));

        if ($response->from) {
            $from = $response->from->name;
            $date = $response->from->departure;
        }

        if ($response->to) {
            $to = $response->to->name;
        }

        if (isset($response->stations->from[0])) {
            if ($response->stations->from[0]->score < 101) {
                foreach (array_slice($response->stations->from, 1, 3) as $station) {
                    if ($station->score > 97) {
                        $stationsFrom[] = $station->name;
                    }
                }
            }
        }

        if (isset($response->stations->to[0])) {
            if ($response->stations->to[0]->score < 101) {
                foreach (array_slice($response->stations->to, 1, 3) as $station) {
                    if ($station->score > 97) {
                        $stationsTo[] = $station->name;
                    }
                }
            }
        }
        return new Zugverbindung($from, $to, $date);
    }
}