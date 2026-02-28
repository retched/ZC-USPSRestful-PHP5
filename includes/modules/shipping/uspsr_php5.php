<?php
/**
 * USPS Shipping (RESTful) for Zen Cart - PHP 5 Version
 * Version 0.0.0
 * 
 * @copyright Portions Copyright 2004-2026 Zen Cart Team
 * @author Paul Williams (retched)
 * @version $Id: uspsr_php5.php 0000-00-00 retched Version 0.0.0 $
****************************************************************************
    USPS Shipping (w/REST API) for Zen Cart - PHP 5 Version
    A shipping module for ZenCart, an ecommerce platform
    Copyright (C) 2026 Paul Williams (retched / retched@hotmail.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
****************************************************************************/

if (!defined('IS_ADMIN_FLAG')) {
    exit('Illegal Access');
}

// This isn't defined pre-ZC 2.0.0
/**
 * The length measurement standard of the ZenCart installation
 * Valid values: "inches" or "centimeters"
 */
define('SHIPPING_DIMENSION_UNITS', 'inches');

/**
 * The weight measurement standard of the ZenCart installation
 * Valid values: "lbs" (for pounds) or "kgs" (for kilograms). (DO NOT USE A PERIOD)
 */
define('SHIPPING_WEIGHT_UNITS', 'lbs');

class uspsr_php5 extends base
{
    public $code, $icon, $title, $enabled, $description, $tax_class, $tax_basis, $sort_order = 0, $quotes = [];

    const USPSR_MILITARY_MAIL_ZIP = array(
        '09001','09002','09003','09004','09005','09006','09007','09008','09009','09010',
        '09011','09012','09013','09014','09015','09016','09017','09018','09020','09021',
        '09028','09031','09033','09034','09036','09038','09042','09044','09045','09046',
        '09049','09051','09053','09054','09055','09056','09058','09059','09060','09063',
        '09067','09068','09069','09074','09075','09076','09079','09080','09081','09086',
        '09088','09089','09090','09092','09094','09095','09096','09099','09100','09101',
        '09102','09103','09104','09107','09110','09112','09113','09114','09115','09116',
        '09123','09125','09126','09128','09131','09135','09136','09137','09138','09139',
        '09140','09142','09143','09154','09160','09161','09165','09166','09169','09170',
        '09171','09172','09173','09174','09175','09176','09177','09178','09180','09182',
        '09183','09185','09186','09201','09203','09204','09211','09212','09213','09214',
        '09216','09225','09226','09227','09229','09237','09240','09241','09242','09244',
        '09245','09250','09252','09261','09262','09263','09264','09265','09266','09267',
        '09276','09277','09278','09279','09280','09283','09285','09287','09289','09290',
        '09291','09292','09300','09301','09302','09303','09304','09305','09306','09307',
        '09308','09309','09310','09311','09312','09313','09314','09315','09316','09317',
        '09318','09319','09320','09321','09322','09323','09324','09327','09328','09330',
        '09331','09332','09333','09334','09336','09337','09338','09339','09340','09342',
        '09343','09344','09346','09347','09348','09350','09351','09352','09353','09354',
        '09355','09356','09357','09358','09359','09360','09361','09362','09363','09364',
        '09365','09366','09367','09368','09369','09370','09371','09372','09373','09374',
        '09375','09376','09377','09378','09379','09380','09381','09382','09383','09384',
        '09386','09387','09388','09389','09390','09391','09393','09394','09396','09397',
        '09399','09401','09402','09403','09409','09410','09420','09421','09447','09454',
        '09456','09459','09461','09463','09464','09467','09468','09469','09470','09487',
        '09488','09489','09490','09491','09494','09496','09497','09498','09499','09501',
        '09502','09503','09504','09505','09506','09507','09508','09509','09510','09511',
        '09512','09513','09514','09516','09517','09520','09522','09523','09524','09532',
        '09533','09534','09541','09542','09543','09544','09545','09549','09550','09554',
        '09556','09557','09564','09565','09566','09567','09568','09569','09570','09573',
        '09574','09575','09576','09577','09578','09579','09581','09582','09583','09586',
        '09587','09588','09589','09590','09591','09592','09593','09594','09595','09596',
        '09599','09600','09601','09602','09603','09604','09605','09606','09607','09608',
        '09609','09610','09611','09612','09613','09614','09617','09618','09619','09620',
        '09621','09622','09623','09624','09625','09626','09627','09630','09631','09633',
        '09634','09636','09642','09643','09644','09645','09647','09648','09649','09701',
        '09702','09703','09704','09705','09706','09707','09708','09709','09710','09711',
        '09712','09713','09714','09715','09716','09717','09718','09719','09720','09721',
        '09722','09723','09724','09725','09726','09727','09728','09729','09730','09731',
        '09732','09733','09734','09735','09736','09737','09738','09739','09740','09741',
        '09742','09743','09744','09745','09746','09747','09748','09749','09750','09751',
        '09752','09753','09754','09755','09756','09757','09758','09759','09760','09761',
        '09762','09769','09771','09777','09780','09789','09790','09798','09800','09801',
        '09802','09803','09804','09805','09806','09807','09808','09809','09810','09811',
        '09812','09813','09814','09815','09816','09817','09818','09819','09820','09821',
        '09822','09823','09824','09825','09826','09827','09828','09829','09830','09831',
        '09832','09833','09834','09835','09836','09837','09838','09839','09840','09841',
        '09842','09843','09844','09845','09846','09847','09848','09851','09852','09853',
        '09854','09855','09856','09857','09858','09859','09860','09861','09862','09863',
        '09864','09865','09867','09868','09869','09870','09871','09872','09873','09874',
        '09875','09876','09877','09880','09888','09890','09892','09895','09898','09901',
        '09902','09903','09904','09908','09909','09910','09974','09975','09976','09977',
        '09978','34001','34002','34004','34006','34007','34008','34009','34010','34011',
        '34020','34021','34022','34023','34024','34025','34030','34031','34032','34033',
        '34034','34035','34036','34037','34038','34039','34041','34042','34043','34044',
        '34050','34051','34052','34053','34054','34055','34058','34060','34066','34067',
        '34068','34069','34071','34076','34078','34079','34080','34081','34082','34083',
        '34084','34085','34086','34087','34088','34089','34090','34091','34092','34093',
        '34094','34095','34096','34098','34099','96201','96202','96203','96204','96205',
        '96206','96207','96208','96209','96210','96212','96213','96214','96215','96217',
        '96218','96219','96220','96221','96224','96251','96257','96258','96259','96260',
        '96262','96264','96266','96267','96269','96271','96273','96275','96276','96278',
        '96283','96284','96297','96301','96303','96306','96309','96310','96311','96313',
        '96315','96319','96321','96322','96323','96326','96328','96330','96331','96336',
        '96337','96338','96339','96343','96346','96347','96348','96349','96350','96351',
        '96362','96365','96367','96368','96370','96371','96372','96373','96374','96375',
        '96376','96377','96378','96379','96380','96382','96384','96385','96386','96387',
        '96388','96389','96400','96401','96426','96427','96444','96447','96501','96502',
        '96503','96504','96505','96507','96510','96511','96515','96516','96517','96518',
        '96520','96521','96522','96530','96531','96532','96534','96535','96536','96537',
        '96538','96539','96540','96541','96542','96543','96544','96546','96547','96548',
        '96549','96550','96551','96552','96553','96554','96555','96557','96562','96577',
        '96578','96595','96598','96599','96601','96602','96603','96604','96605','96606',
        '96607','96608','96609','96610','96611','96612','96613','96614','96615','96616',
        '96617','96619','96620','96621','96622','96624','96628','96629','96631','96632',
        '96633','96634','96641','96642','96643','96644','96645','96649','96650','96657',
        '96660','96661','96662','96663','96664','96665','96666','96667','96668','96669',
        '96670','96671','96672','96673','96674','96675','96677','96678','96679','96681',
        '96682','96683','96686','96687','96691','96692','96693','96694','96695','96696',
        '96698'
    );

    protected $debug_enabled = FALSE, $typeCheckboxesSelected = [], $debug_filename, $bearerToken, $bearerExpiration = 0, $quote_weight, $_check, $machinable, $shipment_value = 0, $insured_value = 0, $uninsured_value = 0, $orders_tax = 0, $items_weight = 0, $is_us_shipment, $is_apo_dest = FALSE, $usps_countries, $enable_media_mail;
    protected $api_base = 'https://apis.usps.com/';
    protected $_standard, $ltrQuote, $pkgQuote, $uspsStandards, $uspsLetter, $dimensions = [], $errors = [];


    protected $commError, $commErrNo, $commInfo;

    const USPSR_CURRENT_VERSION = 'v0.0.0';
    const ZEN_CART_PLUGIN_ID = 0;

    public function __construct()
    {

    }

    protected function storefrontInitialization()
    {
    }

    protected function usps_translation()
    {
    }

    public function quote($method = '')
    {
    }

    public function check()
    {
    }

    public function install()
    {
    }

    public function keys()
    {
    }

    public function remove()
    {
    }

    protected function uspsrDebug($message)
    {
    }

    protected function quoteLogConfiguration()
    {
    }

    public function update_status()
    {
    }

    protected function adminInitializationChecks()
    {
    }

    protected function checkConfiguration()
    {
    }

    protected function _getQuote()
    {
    }

    protected function _makeStandardsCall($query)
    {
    }

    protected function quoteLogCurlBody($request)
    {
    }

    protected function quoteLogCurlResponse($request)
    {
    }

    protected function quoteLogJSONResponse($response)
    {

    }

    protected function checkToken($expiration_time)
    {
    }

    protected function getBearerToken()
    {
    }

    protected function _makeQuotesCall($call_body, $method)
    {
    }

    protected function _calcCart()
    {
    }

    protected function cleanJSON($data)
    {
    }

    // Mimics the ScriptedInstallerBase updateConfigurationKey from ZenCart 2.0.0+, but uses the normal zen_db_perform instead.
    protected function updateConfigurationKey($key_name, $value_array)
    {

        // Add the value array to the outgoing $sql_data_array
        $sql_data_array = $value_array;

        // Add the last updated value to be updated to now()
        $sql_data_array['last_modified'] = "now()";

        // Remove the date_added value from the array, as it's not being added.
        unset($sql_data_array['date_added']);

        zen_db_perform(TABLE_CONFIGURATION, $sql_data_array, 'update', "configuration_key = '$key_name'");
        
        // Checking to see if the function exists to avoid errors in the customer section of ZenCart
        if (function_exists('zen_record_admin_activity')) zen_record_admin_activity('Updated configuration record: ' . print_r($sql_data_array, true), 'warning');

    }

    // Mimics the ScriptedInstallerBase addConfigurationKey, but uses the normal zen_db_perform instead.
    protected function addConfigurationKey($key_name, $value_array)
    {

        // Add the value array to the outgoing $sql_data_array
        $sql_data_array = $value_array;
        $sql_data_array['configuration_key'] = $key_name;

        // Add the last updated value to be updated to now()
        $sql_data_array['last_modified'] = "now()";

        // Check to see if the key already exists in the database
        if (is_null($this->getConfigurationKey($key_name))) {
            // If it doesn't exist, add it.
            zen_db_perform(TABLE_CONFIGURATION, $sql_data_array);
            if (function_exists('zen_record_admin_activity')) zen_record_admin_activity('Added configuration record: ' . print_r($sql_data_array, true), 'warning');
        } else {
            // If it does exist, update it.
            $this->updateConfigurationKey($key_name, $value_array);
        }
        
    }

    // Quick delete a config key, should be used sparingly.
    protected function deleteConfigurationKeys(array $key_names)
    {
        if (empty($key_names)) {
            return 0;
        }

        global $db;
        $keys_list = implode("','", $key_names);

        $sql = "DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key IN ('" . $keys_list . "')";
        $db->Execute($sql);

        $rows = $db->affectedRows();
        if (function_exists('zen_record_admin_activity')) zen_record_admin_activity('Deleted configuration record(s): ' . $keys_list . ", $rows rows affected.", 'warning');

        return $rows;
    }

    protected function getConfigurationKey($key_name)
    {
        global $db;
        $sql = "SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '" . $key_name . "'";
        $result = $db->Execute($sql);

        if ($result->RecordCount() > 0) {
            return $result->fields['configuration_value'];
        }

        return null;
    }

}