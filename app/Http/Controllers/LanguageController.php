<?php

/**
 * Language Controller.
 * php version 7.1.3
 *
 * @category CMS
 * @package  LGSP3
 * @author   Shakhawat Hossain Molla <sh.sumon99@gmail.com>
 * @license  MIT (https://opensource.org/licenses/MIT)
 * @link     https://technovista.com.bd/solution/vista-cms/
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

/**
 * Language Controller Class.
 *
 * @category CMS
 * @package  LGSP3
 * @author   Shakhawat Hossain Molla <sh.sumon99@gmail.com>
 * @license  MIT (https://opensource.org/licenses/MIT)
 * @link     https://technovista.com.bd/solution/vista-cms/
 */
class LanguageController extends Controller
{
    /**
     * Set Locale.
     *
     * Session was employed to redirect user to the
     * exact same content when the lanaguage is
     * switched.
     *
     * @param string $locale The locale.
     *
     * @return \Illuminate\Http\Response
     * --------------------------------------------------
     */
    public function setLocale($locale)
    {
        Session::put('ses_url', str_replace(url('/'), '', url()->previous()));

        App::setLocale($locale);
        session(['locale' => $locale]);

        $segments = Session::get('ses_url');
        $seg_one = substr(Session::get('ses_url'), 0, 3);

        $new_segments = preg_replace("{$seg_one}/", $locale, $segments, 1);

        Session::forget('ses_url');
        return redirect()->to($new_segments);
    }

    /**
     * Base URL.
     *
     * Set the site's base URL prepending locale code.
     *
     * @return \Illuminate\Http\Response
     * --------------------------------------------------
     */
    public function baseURL()
    {
        $segment = Request::segment(1);
        if (($segment != null) && (in_array($segment, config('app.active_languages')))) {
            session(['locale' => $segment]);
            App::setLocale($segment);
        } else {
            session(['locale' => config('app.fallback_locale')]);
        }

        $locale_url = Session::get('locale') ? Session::get('locale') : config('app.fallback_locale');

        return redirect()->to("/{$locale_url}");
    }
}
