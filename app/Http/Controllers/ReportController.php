<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

// use App\Interfaces\GrafanaInterface;

class ReportController extends Controller {

	// private $grafanaAPI;

	/**
	 * Set the dependencies.
	 *
	 * @param GrafanaInterface $grafanaAPI
	 * @return void
	 */
	// public function __construct(GrafanaInterface $grafanaAPI)
	// {
	// 	$this->grafanaAPI = $grafanaAPI;
	// }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $dashboard
	 * @return Response
	 */
	public function show($dashboard)
	{
		// $param = array(
		// 	"email" => "",
		// 	"username" => config("grafana.username"),
		// 	"password" => config("grafana.password")
		// );
		// $status = $this->grafanaAPI->login($param);

		// $result;
		// if ($status == 200) {
		// 	$result = config("grafana.host")."/api/dashboards/".$dashboard."?theme=light";
		// } else {
		// 	$result = config("grafana.host")."?theme=light";
		// }
		
		$result = config("grafana.host")."/dashboard/db/default?from=now-1h&to=now&theme=light";
		// $result = config("grafana.host")."?theme=light";

		return response()->json($result);
	}

}
