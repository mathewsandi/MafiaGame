<?php

namespace App\Http\Controllers;

use App\Slot;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CrimeTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Bank;
use App\Gun;

class KillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $guns = $user->guns;
        $countguns = $user->guns->count();
        $location = $user->location;
        return view('kill.kill', compact('guns', 'location', 'countguns'));
    }

    public function killPlayer()
    {
        $user = Auth::user();
        $player = Input::get('kill');
        $radioButton = Input::get('radio');
        $playerFind = User::where('name', '=', $player)->first();
        $armor = $playerFind->armors->count();
        $armors = $playerFind->armors->first();
        $slots = Slot::where('owner', '=', $playerFind->name)->first();
        $kill_exp = rand(100, 500);

        if($player == $user->name)
        {
            return redirect('/kill');
        }
        elseif($playerFind->location == $user->location) {
            if ($radioButton == 'Colt Derringer') {
                $gun = Gun::where('name', '=', 'Colt Derringer')->first();
                if ($armor > 0) {
                    if ($gun->power > $armors->defence) {

                        $difference = $armors->defence -= $gun->power;

                        $health = $difference * rand(5, 15);
                        $playerFind->health -= $health;

                        $playerFind->save();

                        if ($playerFind->health <= 0) {
                            $kill_money = $playerFind->money;

                            $playerFind->sitestate = 2;
                            $playerFind->money = 0;
                            $playerFind->save();

                            $user->exp += $kill_exp;
                            $user->money += $kill_money;
                            $user->removeGun($gun);
                            $user->save();
                            if ($slots->owner == $playerFind->name) {
                                $slots->owner = $user->name;
                                $slots->save();
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                            else{
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                        } else {
                            session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                            return redirect('/home');
                        }

                    }
                    else{
                        session()->flash('flash_message_important', 'Your weapon is too weak for this user!');
                        return redirect('/kill');
                    }
                } else {
                    $playerFind->health -= $gun->power * rand(5, 15);
                    $user->save();
                    $playerFind->save();

                    if ($playerFind->health <= 0) {
                        $kill_money = $playerFind->money;

                        $playerFind->sitestate = 2;
                        $playerFind->money = 0;
                        $playerFind->save();

                        $user->exp += $kill_exp;
                        $user->money += $kill_money;
                        $user->removeGun($gun);
                        $user->save();
                        if ($slots->owner == $playerFind->name) {
                            $slots->owner = $user->name;
                            $slots->save();
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                        else{
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                    } else {
                        session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                        return redirect('/home');
                    }
                }
            } elseif ($radioButton == 'Colt SAA') {
                $gun = Gun::where('name', '=', 'Colt SAA')->first();
                if ($armor > 0) {
                    if ($gun->power > $armors->defence) {

                        $difference = $armors->defence -= $gun->power;

                        $health = $difference * rand(5, 15);
                        $playerFind->health -= $health;

                        $playerFind->save();

                        if ($playerFind->health <= 0) {
                            $kill_money = $playerFind->money;

                            $playerFind->sitestate = 2;
                            $playerFind->money = 0;
                            $playerFind->save();

                            $user->exp += $kill_exp;
                            $user->money += $kill_money;
                            $user->removeGun($gun);
                            $user->save();
                            if ($slots->owner == $playerFind->name) {
                                $slots->owner = $user->name;
                                $slots->save();
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                            else{
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                        } else {
                            session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                            return redirect('/home');
                        }

                    }
                    else{
                        session()->flash('flash_message_important', 'Your weapon is too weak for this user!');
                        return redirect('/kill');
                    }
                } else {
                    $playerFind->health -= $gun->power * rand(5, 15);
                    $user->save();
                    $playerFind->save();

                    if ($playerFind->health <= 0) {
                        $kill_money = $playerFind->money;

                        $playerFind->sitestate = 2;
                        $playerFind->money = 0;
                        $playerFind->save();

                        $user->exp += $kill_exp;
                        $user->money += $kill_money;
                        $user->removeGun($gun);
                        $user->save();
                        if ($slots->owner == $playerFind->name) {
                            $slots->owner = $user->name;
                            $slots->save();
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                        else{
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                    } else {
                        session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                        return redirect('/home');
                    }
                }
            } elseif ($radioButton == 'Smith and Wesson') {
                $gun = Gun::where('name', '=', 'Smith and Wesson')->first();
                if ($armor > 0) {
                    if ($gun->power > $armors->defence) {

                        $difference = $armors->defence -= $gun->power;

                        $health = $difference * rand(5, 15);
                        $playerFind->health -= $health;

                        $playerFind->save();

                        if ($playerFind->health <= 0) {
                            $kill_money = $playerFind->money;

                            $playerFind->sitestate = 2;
                            $playerFind->money = 0;
                            $playerFind->save();

                            $user->exp += $kill_exp;
                            $user->money += $kill_money;
                            $user->removeGun($gun);
                            $user->save();
                            if ($slots->owner == $playerFind->name) {
                                $slots->owner = $user->name;
                                $slots->save();
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                            else{
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                        } else {
                            session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                            return redirect('/home');
                        }

                    }
                    else{
                        session()->flash('flash_message_important', 'Your weapon is too weak for this user!');
                        return redirect('/kill');
                    }
                } else {
                    $playerFind->health -= $gun->power * rand(5, 15);
                    $user->save();
                    $playerFind->save();

                    if ($playerFind->health <= 0) {
                        $kill_money = $playerFind->money;

                        $playerFind->sitestate = 2;
                        $playerFind->money = 0;
                        $playerFind->save();

                        $user->exp += $kill_exp;
                        $user->money += $kill_money;
                        $user->removeGun($gun);
                        $user->save();
                        if ($slots->owner == $playerFind->name) {
                            $slots->owner = $user->name;
                            $slots->save();
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                        else{
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                    } else {
                        session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                        return redirect('/home');
                    }
                }
            } elseif ($radioButton == 'Winchester') {
                $gun = Gun::where('name', '=', 'Winchester')->first();
                if ($armor > 0) {
                    if ($gun->power > $armors->defence) {

                        $difference = $armors->defence -= $gun->power;

                        $health = $difference * rand(5, 15);
                        $playerFind->health -= $health;

                        $playerFind->save();

                        if ($playerFind->health <= 0) {
                            $kill_money = $playerFind->money;

                            $playerFind->sitestate = 2;
                            $playerFind->money = 0;
                            $playerFind->save();

                            $user->exp += $kill_exp;
                            $user->money += $kill_money;
                            $user->removeGun($gun);
                            $user->save();
                            if ($slots->owner == $playerFind->name) {
                                $slots->owner = $user->name;
                                $slots->save();
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                            else{
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                        } else {
                            session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                            return redirect('/home');
                        }

                    }
                    else{
                        session()->flash('flash_message_important', 'Your weapon is too weak for this user!');
                        return redirect('/kill');
                    }
                } else {
                    $playerFind->health -= $gun->power * rand(5, 15);
                    $user->save();
                    $playerFind->save();

                    if ($playerFind->health <= 0) {
                        $kill_money = $playerFind->money;

                        $playerFind->sitestate = 2;
                        $playerFind->money = 0;
                        $playerFind->save();

                        $user->exp += $kill_exp;
                        $user->money += $kill_money;
                        $user->removeGun($gun);
                        $user->save();
                        if ($slots->owner == $playerFind->name) {
                            $slots->owner = $user->name;
                            $slots->save();
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                        else{
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                    } else {
                        session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                        return redirect('/home');
                    }
                }
            } elseif ($radioButton == 'Barrett .50 Cal') {
                $gun = Gun::where('name', '=', 'Barrett .50 Cal')->first();
                if ($armor > 0) {
                    if ($gun->power > $armors->defence) {

                        $difference = $armors->defence -= $gun->power;

                        $health = $difference * rand(5, 15);
                        $playerFind->health -= $health;

                        $playerFind->save();

                        if ($playerFind->health <= 0) {
                            $kill_money = $playerFind->money;

                            $playerFind->sitestate = 2;
                            $playerFind->money = 0;
                            $playerFind->save();

                            $user->exp += $kill_exp;
                            $user->money += $kill_money;
                            $user->removeGun($gun);
                            $user->save();
                            if ($slots->owner == $playerFind->name) {
                                $slots->owner = $user->name;
                                $slots->save();
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                            else{
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                        } else {
                            session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                            return redirect('/home');
                        }

                    }
                    else{
                        session()->flash('flash_message_important', 'Your weapon is too weak for this user!');
                        return redirect('/kill');
                    }
                } else {
                    $playerFind->health -= $gun->power * rand(5, 15);
                    $user->save();
                    $playerFind->save();

                    if ($playerFind->health <= 0) {
                        $kill_money = $playerFind->money;

                        $playerFind->sitestate = 2;
                        $playerFind->money = 0;
                        $playerFind->save();

                        $user->exp += $kill_exp;
                        $user->money += $kill_money;
                        $user->removeGun($gun);
                        $user->save();
                        if ($slots->owner == $playerFind->name) {
                            $slots->owner = $user->name;
                            $slots->save();
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                        else{
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                    } else {
                        session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                        return redirect('/home');
                    }
                }
            } elseif ($radioButton == 'Thompson') {
                $gun = Gun::where('name', '=', 'Thompson')->first();
                if ($armor > 0) {
                    if ($gun->power > $armors->defence) {

                        $difference = $armors->defence -= $gun->power;

                        $health = $difference * rand(5, 15);
                        $playerFind->health -= $health;

                        $playerFind->save();

                        if ($playerFind->health <= 0) {
                            $kill_money = $playerFind->money;

                            $playerFind->sitestate = 2;
                            $playerFind->money = 0;
                            $playerFind->save();

                            $user->exp += $kill_exp;
                            $user->money += $kill_money;
                            $user->removeGun($gun);
                            $user->save();
                            if ($slots->owner == $playerFind->name) {
                                $slots->owner = $user->name;
                                $slots->save();
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                            else{
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                        } else {
                            session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                            return redirect('/home');
                        }

                    }
                    else{
                        session()->flash('flash_message_important', 'Your weapon is too weak for this user!');
                        return redirect('/kill');
                    }
                } else {
                    $playerFind->health -= $gun->power * rand(5, 15);
                    $user->save();
                    $playerFind->save();

                    if ($playerFind->health <= 0) {
                        $kill_money = $playerFind->money;

                        $playerFind->sitestate = 2;
                        $playerFind->money = 0;
                        $playerFind->save();

                        $user->exp += $kill_exp;
                        $user->money += $kill_money;
                        $user->removeGun($gun);
                        $user->save();
                        if ($slots->owner == $playerFind->name) {
                            $slots->owner = $user->name;
                            $slots->save();
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                        else{
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                    } else {
                        session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                        return redirect('/home');
                    }
                }
            } elseif ($radioButton == 'Minigun') {
                $gun = Gun::where('name', '=', 'Minigun')->first();
                if ($armor > 0) {
                    if ($gun->power > $armors->defence) {

                        $difference = $armors->defence -= $gun->power;

                        $health = $difference * rand(5, 15);
                        $playerFind->health -= $health;

                        $playerFind->save();

                        if ($playerFind->health <= 0) {
                            $kill_money = $playerFind->money;

                            $playerFind->sitestate = 2;
                            $playerFind->money = 0;
                            $playerFind->save();

                            $user->exp += $kill_exp;
                            $user->money += $kill_money;
                            $user->removeGun($gun);
                            $user->save();
                            if ($slots->owner == $playerFind->name) {
                                $slots->owner = $user->name;
                                $slots->save();
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                            else{
                                session()->flash('flash_message', 'You killed the player!');
                                return redirect('/home');
                            }
                        } else {
                            session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                            return redirect('/home');
                        }

                    }
                    else{
                        session()->flash('flash_message_important', 'Your weapon is too weak for this user!');
                        return redirect('/kill');
                    }
                } else {
                    $playerFind->health -= $gun->power * rand(5, 15);
                    $user->save();
                    $playerFind->save();

                    if ($playerFind->health <= 0) {
                        $kill_money = $playerFind->money;

                        $playerFind->sitestate = 2;
                        $playerFind->money = 0;
                        $playerFind->save();

                        $user->exp += $kill_exp;
                        $user->money += $kill_money;
                        $user->removeGun($gun);
                        $user->save();
                        if ($slots->owner == $playerFind->name) {
                            $slots->owner = $user->name;
                            $slots->save();
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                        else{
                            session()->flash('flash_message', 'You killed the player!');
                            return redirect('/home');
                        }
                    } else {
                        session()->flash('flash_message_important', 'You didnt manage to kill the player!');
                        return redirect('/home');
                    }
                }
            } else {
                session()->flash('flash_message_important', 'You Failed To Kill Anyone!!');
                return redirect('/home');
            }
        }else{
            session()->flash('flash_message_important', 'You are not in the same location!!');
            return redirect('/home');
        }
    }
}