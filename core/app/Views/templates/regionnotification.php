<!--Region Notification-->
<div class="region-notification-wrapper">
	<div class="region-notification-close">X</div>
	<div class="region-notification-inner">
		<div class="region-notificaiton-col col-text">You are currently viewing the Radar USA website. To view the products in your location, select the desired region from the drop-down list.</div>
		<div class="region-notificaiton-col col-select">
			<select class="selectpicker"  data-style="">
			  <option data-icon="omniicon-location-pin" value="US">UNITED STATES</option>
			  <option data-icon="omniicon-location-pin" value="CA">CANADA</option>
			  <option data-icon="omniicon-location-pin" value="EU">EUROPE</option>
                <option data-icon="omniicon-location-pin" value="IT"> ITALY </option>
                <option data-icon="omniicon-location-pin" value="ES"> SPAIN </option>
                <option data-icon="omniicon-location-pin" value="FR"> FRANCE </option>
                <option data-icon="omniicon-location-pin" value="PT"> PORTUGAL </option>
			  <option data-icon="omniicon-location-pin" value="APAC">ASIA, MIDDLE EAST AND AFRICA</option>
			  <!--<option data-icon="omniicon-location-pin" value="ROW">MIDDLE EAST AND AFRICA</option>-->
			  <!--<option data-icon="omniicon-location-pin" value="ROW">REST OF THE WORLD</option>-->
			</select>
		</div>
		<!--<div class="region-notificaiton-col col-button">
			<a href="#" class="button button-dark btn-block">Continue</a>		
		</div>-->
	</div>
</div>
<style>
	.region-notification-wrapper{width: 100%;height: 0;opacity: 0;background-color: #da2224;position: relative;z-index: 200;;transition: height opacity .3s ease-in-out;overflow:inherit;display:none;}
	.region-notification-close{
		position: absolute;
		top: 0;
		right: 0;
		height: 30px;
		width: 30px;
		font-size: 20px;
		color: white;
		background-color: transparent;
		cursor: pointer;
	}
	.region-notification-inner{
		width: 100%;
		height: 100%;
		padding: 25px;
		display: flex;
		justify-content: center;
		align-content: center;
		flex-direction: row;
		flex-wrap: wrap;
	}
	.region-notificaiton-col{padding: 5px;}
	.region-notificaiton-col {
      display: flex;
      justify-content: flex-start;
      align-content: center;
      flex-direction: row;
      flex-wrap: wrap;
    }
	.col-text{
		color: #fff;
		font-size: 110%;
		line-height: 1.2;
	}
	.col-button button{font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important; font-weight: 600 !important;font-size: 16px;
letter-spacing: 3px;}

    .col-select .bootstrap-select{width:100% !important;}
    
    .col-select .bootstrap-select .dropdown-toggle{
        font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important; font-weight: 600 !important;font-size: 16px;
letter-spacing: 3px;color:#000;background-color: #fff; border:none;padding-top: 7px; padding-bottom: 7px;
    }
    .col-select .bootstrap-select .btn.dropdown-toggle:focus,
    .col-select .bootstrap-select .btn.dropdown-toggle:visited,
    .col-select .bootstrap-select .btn.dropdown-toggle:active
    {outline:none!important;box-shadow:none;background-color:#fff;color:#000;border:none;}
    .col-select .bootstrap-select .btn.dropdown-toggle i{
        font-size: 1.8rem;
        width: 23px;
        height: 23px;
        overflow: hidden;
        margin-bottom: -3px;
        margin-top: -6px;
    }
    .col-select .bootstrap-select .dropdown-menu{
        background-color: #fff;
        border-color: #f7f7f7;
    }
    .col-select .bootstrap-select .dropdown-menu a.dropdown-item {
        color: #000;
        font-family: 'GothamHTF-MediumCondensed',Arial,Helvetica,sans-serif !important;
        font-weight: 500 !important;
        font-size: 16px;
        letter-spacing: 1px;
        text-shadow: none;
        word-spacing: -2px;
        padding-left: 0.6rem;
        padding-right: 0.6rem;
    }
    .col-select .bootstrap-select.btn-group .dropdown-toggle .filter-option{
        overflow:hidden;
    }
	.col-button .button{margin: 0;background-color: #fff;color:#da2224;opacity: 1;}
	.col-button .button:hover{background-color: #fff;color:#000;opacity: 1;}
	
    .col-select, .col-button, .col-text{ flex:1 1 30%; }
    .col-text{ min-width: 70%; }
	.col-select, .col-button{min-width:30%;}
	
	@media only screen and (max-width:768px){
	    .col-text{
    		min-width: 100%;
    		font-size:1rem;
    	}
    	.col-select, .col-button{min-width:25%;}
	}
	@media only screen and (max-width:600px){
	    .col-text{
    		min-width: 100%;
    		font-size:1rem;
    	}
    	.col-select, .col-button{min-width:50%;}
	}
	@media only screen and (max-width:450px){
	    .region-notification-inner {
          align-content: center;
        }
	    .col-text,.col-select,.col-button{
    		min-width: 100%;
    	}
    	
	    .col-text{
    		font-size:0.8rem;
    	}
	}
</style>