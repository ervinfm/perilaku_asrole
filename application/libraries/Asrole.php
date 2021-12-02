<?php defined('BASEPATH') or exit('No direct script access allowed');

class Asrole
{
	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
	}

	function freq_support($data, $atribut = null)
	{
		$params = [
			'sup1' => 0, 'sup2' => 0, 'sup3' => 0, 'sup4' => 0, 'sup5' => 0, 'sup6' => 0, 'sup7' => 0, 'sup8' => 0, 'sup9' => 0,
		];

		$datas = explode(",", $data);
		foreach ($datas as $x => $x_value) {
			if ($x_value == 'P1') {
				$params['sup1'] = $params['sup1'] + 1;
			} else if ($x_value == 'P2') {
				$params['sup2'] = $params['sup2'] + 1;
			} else if ($x_value == 'P3') {
				$params['sup3'] = $params['sup3'] + 1;
			} else if ($x_value == 'P4') {
				$params['sup4'] = $params['sup4'] + 1;
			} else if ($x_value == 'P5') {
				$params['sup5'] = $params['sup5'] + 1;
			} else if ($x_value == 'P6') {
				$params['sup6'] = $params['sup6'] + 1;
			} else if ($x_value == 'P7') {
				$params['sup7'] = $params['sup7'] + 1;
			} else if ($x_value == 'P8') {
				$params['sup8'] = $params['sup8'] + 1;
			} else if ($x_value == 'P9') {
				$params['sup9'] = $params['sup9'] + 1;
			}
		}
		return $params[$atribut];
	}

	function support_dataset($row, $params)
	{
		$var1 = $var2 = $var3 = $var4 = $var5 = $var6 = $var7 = $var8 = $var9 = 0;

		foreach ($row->result() as $key => $data) {
			switch ($params) {
				case 1:
					$dataset = $data->params1_dataset;
					break;
				case 2:
					$dataset = $data->params2_dataset;
					break;
				case 3:
					$dataset = $data->params3_dataset;
					break;
				case 4:
					$dataset = $data->params4_dataset;
					break;
			}
			$var1 = $var1 + $this->freq_support($dataset, 'sup1');
			$var2 = $var2 + $this->freq_support($dataset, 'sup2');
			$var3 = $var3 + $this->freq_support($dataset, 'sup3');
			$var4 = $var4 + $this->freq_support($dataset, 'sup4');
			$var5 = $var5 + $this->freq_support($dataset, 'sup5');
			$var6 = $var6 + $this->freq_support($dataset, 'sup6');
			$var7 = $var7 + $this->freq_support($dataset, 'sup7');
			$var8 = $var8 + $this->freq_support($dataset, 'sup8');
			$var9 = $var9 + $this->freq_support($dataset, 'sup9');
		}

		$all = $var1 + $var2 + $var3 + $var4 + $var5 + $var6 + $var7 + $var8 + $var9;

		$params = [
			'count1' => $var1,
			'count2' => $var2,
			'count3' => $var3,
			'count4' => $var4,
			'count5' => $var5,
			'count6' => $var6,
			'count7' => $var7,
			'count8' => $var8,
			'count9' => $var9,
			'support1' => round(($var1 / $all) * 100, 1),
			'support2' => round(($var2 / $all) * 100, 1),
			'support3' => round(($var3 / $all) * 100, 1),
			'support4' => round(($var4 / $all) * 100, 1),
			'support5' => round(($var5 / $all) * 100, 1),
			'support6' => round(($var6 / $all) * 100, 1),
			'support7' => round(($var7 / $all) * 100, 1),
			'support8' => round(($var8 / $all) * 100, 1),
			'support9' => round(($var9 / $all) * 100, 1),
			'count_all' => $all,
		];
		return $params;
	}

	function insert_itemset1($id, $id_fak, $atribut, $jumlah, $support, $lolos)
	{
		$params = [
			'id_proses' => $id,
			'id_fakultas' => $id_fak,
			'atribut' => $atribut,
			'jumlah' => $jumlah,
			'support' => round($support, 2),
			'lolos' => $lolos,
		];
		$this->CI->db->insert('tbl_itemset1', $params);
	}

	function insert_itemset2($id, $id_fak, $atribut1, $atribut2, $jumlah, $support, $lolos)
	{
		$params = [
			'id_proses' => $id,
			'id_fakultas' => $id_fak,
			'atribut1' => $atribut1,
			'atribut2' => $atribut2,
			'jumlah' => $jumlah,
			'support' => $support,
			'lolos' => $lolos,
		];
		$this->CI->db->insert('tbl_itemset2', $params);
	}

	function insert_itemset3($id, $id_fak, $atribut1, $atribut2, $atribut3, $jumlah, $support, $lolos)
	{
		$params = [
			'id_proses' => $id,
			'id_fakultas' => $id_fak,
			'atribut1' => $atribut1,
			'atribut2' => $atribut2,
			'atribut3' => $atribut3,
			'jumlah' => $jumlah,
			'support' => $support,
			'lolos' => $lolos,
		];
		$this->CI->db->insert('tbl_itemset3', $params);
	}
}
