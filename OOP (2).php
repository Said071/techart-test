<?php
date_default_timezone_set('Europe/Moscow'); 

    // class Date
    // {
    //     private $d;
    //     private $m;
    //     private $y;
    //     public function __construct($date = null)
    //     {
    //         $d = [];

    //         if (!$date) {
    //             $d = explode("-", date('Y-m-d'));   
    //         } else {
    //             $d = explode("-", $date);
    //         }

    //         $this->d = $d[2];
    //         $this->m = $d[1];
    //         $this->y = $d[0];
    //     }
        
    //     public function getDay()
    //     {
    //         echo date('d', $this->getTimestamp()); // возвращает день
    //         echo "<p></p>";
    //     }
        
    //     public function getMonth($lang = null)
    //     {
    //         if (!$lang) {
    //             echo date('m', $this->getTimestamp()); // возвращает месяц
    //         } else {
    //             $this->setlocale($lang);
    //             echo strftime('%B', $this->getTimestamp());
    //         }

    //         echo "<p></p>";
            
    //         // переменная $lang может принимать значение ru или en
    //         // если эта не пуста - пусть месяц будет словом на заданном языке
    //     }
        
    //     public function getYear()
    //     {
    //         echo date('Y', $this->getTimestamp()); // возвращает год

    //         echo "<p></p>";
    //     }
        
    //     public function getWeekDay($lang = null)
    //     {
    //         if (!$lang) {
    //             echo date('N', $this->getTimestamp()); // возвращает месяц
    //         } else {
    //             $this->setlocale($lang);
    //             echo strtolower(strftime('%A', $this->getTimestamp()));
    //         }

    //         echo "<p></p>";
    //         // возвращает день недели
            
    //         // переменная $lang может принимать значение ru или en
    //         // если эта не пуста - пусть день будет словом на заданном языке
    //     }
        
    //     public function addDay($value)
    //     {
    //         $this->d += $value;
    //     }
        
    //     public function subDay($value)
    //     {
    //         $this->d -= $value; // отнимает значение $value от дня
    //     }
        
    //     public function addMonth($value)
    //     {
    //         $this->m += $value; // добавляет значение $value к месяцу
    //     }
        
    //     public function subMonth($value)
    //     {
    //         $this->m -= $value;// отнимает значение $value от месяца
    //     }
        
    //     public function addYear($value)
    //     {
    //         $this->y += $value; // добавляет значение $value к году
    //     }
        
    //     public function subYear($value)
    //     {
    //         $this->y -= $value; // отнимает значение $value от года
    //     }
        
    //     public function format($format)
    //     {
    //         echo date($format, $this->getTimestamp());
    //         // выведет дату в указанном формате
    //         // формат пусть будет такой же, как в функции date
    //     }
        
    //     public function __toString()
    //     {
    //         // выведет дату в формате 'год-месяц-день'
    //         echo date('Y-m-d', $this->getTimestamp());
    //     }

    //     private function setLocale($lang) {
    //         if ($lang == 'ru') {
    //             setlocale(LC_ALL, 'ru_RU.UTF-8', 'rus_RUS.UTF-8', 'Russian_Russia.UTF-8');
    //         }

    //         if ($lang == 'en') {
    //             setlocale(LC_ALL, 'en_US', 'en_US.UTF8', 'en', 'english');
    //         }
    //     }

    //     private function getTimestamp() {
    //         return mktime(0, 0, 0, $this->m, $this->d, $this->y);
    //     }
    // }


class Date
{
    private $date;

    public function __construct($date = null)
    {
        $this->date = $date ? new DateTime($date) : new DateTime();
    }

    public function getDay()
    {
        return $this->date->format('d');
    }

    public function getMonth($lang = null)
    {
        if ($lang === 'ru') {
            $months = [
                '01' => 'Январь', '02' => 'Февраль', '03' => 'Март', '04' => 'Апрель',
                '05' => 'Май', '06' => 'Июнь', '07' => 'Июль', '08' => 'Август',
                '09' => 'Сентябрь', '10' => 'Октябрь', '11' => 'Ноябрь', '12' => 'Декабрь'
            ];
            return $months[$this->date->format('m')];
        } elseif ($lang === 'en') {
            return $this->date->format('F');
        } else {
            return $this->date->format('m');
        }
    }

    public function getYear()
    {
        return $this->date->format('Y');
    }

    public function getWeekDay($lang = null)
    {
        if ($lang === 'ru') {
            $weekDays = [
                'Sunday' => 'Воскресенье', 'Monday' => 'Понедельник', 'Tuesday' => 'Вторник',
                'Wednesday' => 'Среда', 'Thursday' => 'Четверг', 'Friday' => 'Пятница',
                'Saturday' => 'Суббота'
            ];
            return $weekDays[$this->date->format('l')];
        } elseif ($lang === 'en') {
            return $this->date->format('l');
        } else {
            return $this->date->format('N'); // 1 (for Monday) through 7 (for Sunday)
        }
    }

    public function addDay($value)
    {
        $this->date->modify("+$value days");
    }

    public function subDay($value)
    {
        $this->date->modify("-$value days");
    }

    public function addMonth($value)
    {
        $this->date->modify("+$value months");
    }

    public function subMonth($value)
    {
        $this->date->modify("-$value months");
    }

    public function addYear($value)
    {
        $this->date->modify("+$value years");
    }

    public function subYear($value)
    {
        $this->date->modify("-$value years");
    }

    public function format($format)
    {
        return $this->date->format($format);
    }

    public function __toString()
    {
        return $this->date->format('Y-m-d');
    }
}


    $date = new Date('2025-12-31');
    
    echo $date->getYear();  // выведет '2025'
    echo $date->getMonth(); // выведет '12'
    echo $date->getDay();   // выведет '31'
    
    echo $date->getWeekDay();     // выведет '3'
    echo $date->getWeekDay('ru'); // выведет 'среда'
    echo $date->getWeekDay('en'); // выведет 'wednesday'

    $date->addYear(10);
    echo $date->getYear(); // 2035



    class CoffeeMachine
    {
        private $whater;
        private $coffee;

        public function __construct() {
            $this->whater = 0;
            $this->coffee = 0;
        }

        public function setWhater() {
            $this->whater = 100;
            echo "<p>Заправили воду</p>";
        }

        public function setCoffee() {
            $this->coffee = 100;
            echo "<p>Засыпали кофе</p>";
        }

        private function checkMachine() {
            $result = true;

            if ($this->whater < 50) {
                echo "<p>Мало воды</p>";
                $result = false;
            }

            if ($this->coffee < 50) {
                echo "<p>Мало кофе</p>";
                $result = false;
            }

            return $result;
        }

        public function makeCoffee() {
            if ($this->checkMachine()) {
                $this->whater -= 50;
                $this->coffee -=50;
                echo "<p>Кофе готов</p>";
            } else {
                echo "<p>Нельзя приготовить кофе</p>";
            }
        }
    }

    $cm = new CoffeeMachine();
    $cm->setWhater();
    $cm->setCoffee();
    $cm->makeCoffee();
    $cm->makeCoffee();
    $cm->makeCoffee();
    $cm->setWhater();
    $cm->makeCoffee();
    $cm->setCoffee();
    $cm->makeCoffee();
?>