<?php

namespace App\Http\Middleware;

use App\Helpers\CasPhp\phpCAS;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCAS
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //phpCAS::setDebug('/tmp/phpCAS.log'); // Schrijft debug informatie naar een log-file

        // Parameters: CAS versie, url CAS server, poort CAS server, CAS server URI (idem als host),
        // boolean die aangeeft of sessie moet gestart worden, communicatieprotocol (SAML) tussen toepassing en CAS server
        phpCAS::client(SAML_VERSION_1_1, 'jasig.firat.edu.tr', 443, '/cas', true, 'saml');

        // Geeft aan vanaf welke server logout requests mogelijk zijn
        phpCAS::handleLogoutRequests(true, array('cas1.ugent.be', 'cas2.ugent.be', 'cas3.ugent.be', 'cas4.ugent.be', 'cas5.ugent.be', 'cas6.ugent.be'));

        // Configuratie van het certificaat van de CAS server
        //phpCAS::setExtraCurlOption(CURLOPT_SSLVERSION, 3);
        // Locatie van het "trusted certificate authorities" bestand:
        //phpCAS::setCasServerCACert('/home/administrator/firat.edu.tr.pem');
        // Geen server verificatie (minder veilig!):
        phpCAS::setNoCasServerValidation();
        // Hier gebeurt de authenticatie van de gebruiker
        phpCAS::forceAuthentication();

        $attr = phpCAS::getAttributes();

        if ($attr) {
            if ($attr['userEMailAddress'] != "hakanguler@firat.edu.tr"
                and $attr['userEMailAddress'] != "mustafaulas@firat.edu.tr")
            {
                return abort(403,'Panele Giriş Yetkiniz Bulunmamaktadır!');
            }
            /*else{
                //Student Control Start
                if(!is_null($attr['userGroupMembership'])){
                    $userGroupMembership = $attr['userGroupMembership'][0];
                    $userGroupMembership= explode('=', $userGroupMembership);
                    $userGroupMembership= explode(',', $userGroupMembership[2])[0];
                    if($userGroupMembership == 'Student'){
                        return abort(403,'Öğrenci grubu sisteme giriş yapamaz!');
                    }
                }else{
                    return abort(403,'Tanımlanamayan grup üyeliği!');
                }
            }*/
            //Student Control End

            $user = User::where('userEMailAddress', $attr['userEMailAddress'])->first();

            if ($user) {
                $user->update($attr);
            } else {
                $user = User::create($attr);
            }

            Auth::login($user);

            //if (auth()->user()->getRoleNames()->count() > 0) {
            return $next($request);
            //} else {
            //    return view('welcome')->with('user',Auth::user());
            //}
        } else {
            abort(401);
        }


    }
}
