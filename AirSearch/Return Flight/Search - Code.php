<?php

$curl = curl_init();
$CREDENTIALS = 'username:password'; 
$auth = base64_encode("$CREDENTIALS");

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/AirService',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
    <soapenv:Header/>
    <soapenv:Body>
        <LowFareSearchReq xmlns="http://www.travelport.com/schema/air_v48_0"  TargetBranch="P7182044" PreferCompleteItinerary="true">
            <BillingPointOfSaleInfo xmlns="http://www.travelport.com/schema/common_v48_0" OriginApplication="uAPI" />
            <SearchAirLeg>
                <SearchOrigin>
                    <CityOrAirport xmlns="http://www.travelport.com/schema/common_v48_0" Code="DAC" PreferCity="true" />
                </SearchOrigin>
                <SearchDestination>
                    <CityOrAirport xmlns="http://www.travelport.com/schema/common_v48_0" Code="DXB" PreferCity="true" />
                </SearchDestination>
                <SearchDepTime PreferredTime="2022-08-18" />
            </SearchAirLeg>
            <SearchAirLeg>
                <SearchOrigin>
                    <CityOrAirport xmlns="http://www.travelport.com/schema/common_v48_0" Code="DXB" PreferCity="true" />
                </SearchOrigin>
                <SearchDestination>
                    <CityOrAirport xmlns="http://www.travelport.com/schema/common_v48_0" Code="DAC" PreferCity="true" />
                </SearchDestination>
                <SearchDepTime PreferredTime="2022-08-18" />
            </SearchAirLeg>
            <AirSearchModifiers>
                <PreferredProviders>
                    <Provider xmlns="http://www.travelport.com/schema/common_v48_0" Code="1G" />
                </PreferredProviders>
                <PermittedCabins>
                    <CabinClass Type="Economy" xmlns=\'http://www.travelport.com/schema/common_v48_0\' />
                </PermittedCabins>
                <FlightType NonStopDirects="true" />
            </AirSearchModifiers>
            <SearchPassenger xmlns="http://www.travelport.com/schema/common_v48_0" Code="ADT" />
            <AirPricingModifiers CurrencyType="BDT">
                <!-- <AccountCodes>
                    <AccountCode xmlns="http://www.travelport.com/schema/common_v48_0" Code="-" />
                </AccountCodes> -->
            </AirPricingModifiers>
        </LowFareSearchReq>
    </soapenv:Body>
</soapenv:Envelope>',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/xml',
    "Authorization: Basic $auth"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;