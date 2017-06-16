<div>
            <?php screen_icon(); ?>
            <h1>MailChimp Settings</h1>
    <form id="" enctype="multipart/form-data" method="post" name="" action="">

    <!-- Display Setting -->
            <div class="display_setting dis_sec">
                    <p>These are some MailChimp settings.</p>
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <label for="Enable MailChimp"><?php _e( 'Enable MailChimp', 'ib_monk_network_demo' ); ?></label>
                                    </th>
                                    <td>
                                        <fieldset>
                                            <input type="hidden" name="ib_mailchimp" value="0">
                                            <label><input type="checkbox" id="ib_mailchimp" name="ib_mailchimp" value="1" <?php checked( 1, $this->settings['ib_mailchimp'] ); ?>> <?php _e( 'If checked, this will auto enable MailChimp. Disable this if you do not want to use MailChimp. ', 'ib_monk_network_demo' ); ?></label>
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="MailChimp User Name"><?php _e( 'MailChimp User Name', 'ib_monk_network_demo' ); ?></label>
                                    </th>
                                    <td>
                                        <fieldset>
                                            <input type="text" id="ib_mailchimp_username" name="ib_mailchimp_username" value="<?php echo $this->settings['ib_mailchimp_username']; ?>" placeholder="User Name"/>

                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="MailChimp API Key"><?php _e( 'MailChimp API Key', 'ib_monk_network_demo' ); ?></label>
                                    </th>
                                    <td>
                                        <fieldset>
                                            <input type="text" id="ib_mailchimp_api_key" name="ib_mailchimp_api_key" value="<?php echo $this->settings['ib_mailchimp_api_key']; ?>" placeholder="API Key"/ style="width:50%;">
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="MailChimp List ID"><?php _e( 'MailChimp List ID', 'ib_monk_network_demo' ); ?></label>
                                    </th>
                                    <td>
                                            <?php
                                            if(isset($this->settings['ib_mailchimp_api_key'])){
                                                $api_key = $this->settings['ib_mailchimp_api_key'] ;
                                            }else { $api_key = ''; }

                                            $data = array( 'fields' => 'lists', 'count' => 5,'before_date_created' => '2050-01-01 10:30:50','after_date_created' => '2017-01-01' );

                                            $url = 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/';
                                            $result = json_decode( rudr_mailchimp_curl_connect( $url, 'GET', $api_key, $data) );

                                            if( !empty($result->lists) ) {
                                            	echo "<select name='ib_mailchimp_list_id'>";

                                                foreach( $result->lists as $list ){
                                                    if ($list->id == $this->settings['ib_mailchimp_list_id']) {
                                                        echo '<option value="' . $list->id . '" selected>' . $list->name . ' (' . $list->stats->member_count . ')</option>';
                                                    } elseif ($list->id != $this->settings['ib_mailchimp_list_id']) {
                                                        echo '<option value="' . $list->id . '">' . $list->name . ' (' . $list->stats->member_count . ')</option>';
                                                    }
                                            	}
                                            	echo '</select>';
                                            } elseif ( is_int( $result->status ) ) { // full error glossary is here http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/
                                            	echo '<strong>' . $result->title . ':</strong> ' . $result->detail;
                                            }
                                             ?>
                                             <input type="button" class="button-primary" value="Reload List" onClick="window.location.reload()">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <p class="submit no-border">
                <input class="button-primary" name="submit" value="<?php _e( 'Save', 'ib-monk-network-demo' ) ?>" type="submit"/><br /><br />
            </p>

        </form>
</div>

<?php
function rudr_mailchimp_curl_connect( $url, $request_type, $api_key, $data = array() ) {
	if( $request_type == 'GET' )
		$url .= '?' . http_build_query($data);

	$mch = curl_init();
	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '.base64_encode( 'user:'. $api_key )
	);
	curl_setopt($mch, CURLOPT_URL, $url );
	curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
	curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
	curl_setopt($mch, CURLOPT_TIMEOUT, 10);
	curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection

	if( $request_type != 'GET' ) {
		curl_setopt($mch, CURLOPT_POST, true);
		curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
	}
	return curl_exec($mch);
}
?>
