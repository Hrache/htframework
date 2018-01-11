<?php
class CarsModel extends MySQLModelAbstract {
 const MODEL = 'acs_carmodels_tbl';

 const id                                     = 'id';
 const distance                               = 'distance';
 const brandid                                = 'brandid';
 const modelid                                = 'modelid';
 const carcondition                           = 'carcondition';
 const carprice                               = 'carprice';
 const bodytype                               = 'bodytype';
 const year                                   = 'year';
 const countryid                              = 'countryid';
 const accountid                              = 'accountid';
 const advertisement_type                     = 'advertisement_type';
 const engine_size                            = 'engine_size';
 const fueltype                               = 'fueltype';
 const horsepower                             = 'horsepower';
 const transmission                           = 'transmission';
 const doors                                  = 'doors';
 const width                                  = 'width';
 const height                                 = 'height';
 const length                                 = 'length';
 const _0to100kmhtime                         = '_0to100kmhtime';
 const _0to60mphtime                          = '_0to60mphtime';
 const displacement                           = 'displacement';
 const disaplacement_measure                  = 'disaplacement_measure';
 const topspeed                               = 'topspeed';
 const topspeed_measure                       = 'topspeed_measure';
 const city_consumption                       = 'city_consumption';
 const highway_consumption                    = 'highway_consumption';
 const combined_consumption                   = 'combined_consumption';
 const fuel_consumption                       = 'fuel_consumption';
 const co2emissions                           = 'co2emissions';
 const seatingcapacity                        = 'seatingcapacity';
 const transmission_shifts                    = 'transmission_shifts';
 const drivetype                              = 'drivetype';
 const tirewheelsize                          = 'tirewheelsize';
 const tirewheelsize_measure                  = 'tirewheelsize_measure';
 const countryorigin_id                       = 'countryorigin_id';
 const countryassembly_id                     = 'countryassembly_id';
 const torque                                 = 'torque';
 const torque_measure                         = 'torque_measure';
 const curbweight                             = 'curbweight';
 const curbweight_measure                     = 'curbweight_measure';
 const headairbags                            = 'headairbags';
 const hipairbags                             = 'hipairbags';
 const passengerairbagdeactivation            = 'passengerairbagdeactivation';
 const sidesirbags                            = 'sidesirbags';
 const sidecurtainairbagrolloversensor        = 'sidecurtainairbagrolloversensor';
 const postcollisionsafetysystem              = 'postcollisionsafetysystem';
 const _2ndrowcenterseatbelt                  = '_2ndrowcenterseatbelt';
 const bluetooth                              = 'bluetooth';
 const audio_cdmp3playback                    = 'audio_cdmp3playback';
 const audio_cdplayer                         = 'audio_cdplayer';
 const audio_auxaudioinputs                   = 'audio_auxaudioinputs';
 const audio_usbinputs                        = 'audio_usbinputs';
 const audio_digitalaudioinput                = 'audio_digitalaudioinput';
 const audio_radio                            = 'audio_radio';
 const audio_totalnumberofspeakers            = 'audio_totalnumberofspeakers';
 const audio_usbconnection                    = 'audio_usbconnection';
 const driverseat_heightadjustable            = 'driverseat_heightadjustable';
 const sunshade                               = 'sunshade';
 const cargonettrunkrear                      = 'cargonettrunkrear';
 const allweatherfloormats                    = 'allweatherfloormats';
 const cargonetside2nets                      = 'cargonetside2nets';
 const cargotray                              = 'cargotray';
 const leathershiftknob                       = 'leathershiftknob';
 const tweeterkit                             = 'tweeterkit';
 const metalpedalpadsetatsti                  = 'metalpedalpadsetatsti';
 const autodimmingmirrorwcompass              = 'autodimmingmirrorwcompass';
 const autodimmingmirrorwcompassandhomelink   = 'autodimmingmirrorwcompassandhomelink';
 const audiocontrolsonsteeringwheel           = 'audiocontrolsonsteeringwheel';
 const cruisecontrolsonsteeringwheel          = 'cruisecontrolsonsteeringwheel';
 const phonecontrolsonsteeringwheel           = 'phonecontrolsonsteeringwheel';
 const steeringwheeladjustments               = 'steeringwheeladjustments';
 const transmissioncontrolsonsteeringwheel    = 'transmissioncontrolsonsteeringwheel';
 const numberofpassengerseatmanualadjustments = 'numberofpassengerseatmanualadjustments';
 const adjustableseatheadrest                 = 'adjustableseatheadrest';
 const seatwhiplashprotection                 = 'seatwhiplashprotection';
 const adjustable2ndrowheadrests              = 'adjustable2ndrowheadrests';
 const folding2ndrow                          = 'folding2ndrow';
 const _2ndrowcenterarmrest                   = '_2ndrowcenterarmrest';
 const _1strowupholstery                      = '_1strowupholstery';
 const clock                                  = 'clock';
 const externaltemperaturegauge               = 'externaltemperaturegauge';
 const tachometer                             = 'tachometer';
 const tirepressuremonitoringsystem           = 'tirepressuremonitoringsystem';
 const tripcomputer                           = 'tripcomputer';
 const airfiltration                          = 'airfiltration';
 const frontairconditioning                   = 'frontairconditioning';
 const frontairconditioningzones              = 'frontairconditioningzones';
 const poweroutlets                           = 'poweroutlets';
 const cargotiedowns                          = 'cargotiedowns';
 const centerconsole                          = 'centerconsole';
 const cupholderslocation                     = 'cupholderslocation';
 const doorpocketslocation                    = 'doorpocketslocation';
 const overheadconsole                        = 'overheadconsole';
 const seatbackstorage                        = 'seatbackstorage';
 const intermittentfrontwipers                = 'intermittentfrontwipers';
 const onetouchwindows                        = 'onetouchwindows';
 const powerwindows                           = 'powerwindows';
 const daytimerunninglights                   = 'daytimerunninglights';
 const headlightsautodelay                    = 'headlightsautodelay';
 const headlightsdusksensor                   = 'headlightsdusksensor';
 const _1strowvanitymirrors                   = '_1strowvanitymirrors';
 const exteriormirroradjustment               = 'exteriormirroradjustment';
 const antilockbrakingsystem                  = 'antilockbrakingsystem';
 const brakingassist                          = 'brakingassist';
 const frontstabilizerbar                     = 'frontstabilizerbar';
 const frontsuspensionclassification          = 'frontsuspensionclassification';
 const independentsuspension                  = 'independentsuspension';
 const rearstabilizerbar                      = 'rearstabilizerbar';
 const rearsuspensionclassification           = 'rearsuspensionclassification';
 const tailpipecover                          = 'tailpipecover';
 const wheellockkitsteelwheels                = 'wheellockkitsteelwheels';
 const rearbumperapplique                     = 'rearbumperapplique';
 const splashguards                           = 'splashguards';
 const autodimmingmirrorwapproachlighting     = 'autodimmingmirrorwapproachlighting';
 const bodysidemolding                        = 'bodysidemolding';
 const bodysidemoldingkit                     = 'bodysidemoldingkit';
 const foglampkitlegacy                       = 'foglampkitlegacy';
 const remoteenginestarterkeystart            = 'remoteenginestarterkeystart';

 protected $id = null;
 protected $distance = null;
 protected $brandid = null;
 protected $modelid = null;
 protected $carcondition = null;
 protected $carprice = null;
 protected $bodytype = null;
 protected $year = null;
 protected $countryid = null;
 protected $accountid = null;
 protected $advertisement_type = null;
 protected $engine_size = null;
 protected $fueltype = null;
 protected $horsepower = null;
 protected $transmission = null;
 protected $doors = null;
 protected $width = null;
 protected $height = null;
 protected $length = null;
 protected $_0to100kmhtime = null;
 protected $_0to60mphtime = null;
 protected $displacement = null;
 protected $disaplacement_measure = null;
 protected $topspeed = null;
 protected $topspeed_measure = null;
 protected $city_consumption = null;
 protected $highway_consumption = null;
 protected $combined_consumption = null;
 protected $fuel_consumption = null;
 protected $co2emissions = null;
 protected $seatingcapacity = null;
 protected $transmission_shifts = null;
 protected $drivetype = null;
 protected $tirewheelsize = null;
 protected $tirewheelsize_measure = null;
 protected $countryorigin_id = null;
 protected $countryassembly_id = null;
 protected $torque = null;
 protected $torque_measure = null;
 protected $curbweight = null;
 protected $curbweight_measure = null;
 protected $headairbags = null;
 protected $hipairbags = null;
 protected $passengerairbagdeactivation = null;
 protected $sidesirbags = null;
 protected $sidecurtainairbagrolloversensor = null;
 protected $postcollisionsafetysystem = null;
 protected $_2ndrowcenterseatbelt = null;
 protected $bluetooth = null;
 protected $audio_cdmp3playback = null;
 protected $audio_cdplayer = null;
 protected $audio_auxaudioinputs = null;
 protected $audio_usbinputs = null;
 protected $audio_digitalaudioinput = null;
 protected $audio_radio = null;
 protected $audio_totalnumberofspeakers = null;
 protected $audio_usbconnection = null;
 protected $driverseat_heightadjustable = null;
 protected $sunshade = null;
 protected $cargonettrunkrear = null;
 protected $allweatherfloormats = null;
 protected $cargonetside2nets = null;
 protected $cargotray = null;
 protected $leathershiftknob = null;
 protected $tweeterkit = null;
 protected $metalpedalpadsetatsti = null;
 protected $autodimmingmirrorwcompass = null;
 protected $autodimmingmirrorwcompassandhomelink = null;
 protected $audiocontrolsonsteeringwheel = null;
 protected $cruisecontrolsonsteeringwheel = null;
 protected $phonecontrolsonsteeringwheel = null;
 protected $steeringwheeladjustments = null;
 protected $transmissioncontrolsonsteeringwheel = null;
 protected $numberofpassengerseatmanualadjustments = null;
 protected $adjustableseatheadrest = null;
 protected $seatwhiplashprotection = null;
 protected $adjustable2ndrowheadrests = null;
 protected $folding2ndrow = null;
 protected $_2ndrowcenterarmrest = null;
 protected $_1strowupholstery = null;
 protected $clock = null;
 protected $externaltemperaturegauge = null;
 protected $tachometer = null;
 protected $tirepressuremonitoringsystem = null;
 protected $tripcomputer = null;
 protected $airfiltration = null;
 protected $frontairconditioning = null;
 protected $frontairconditioningzones = null;
 protected $poweroutlets = null;
 protected $cargotiedowns = null;
 protected $centerconsole = null;
 protected $cupholderslocation = null;
 protected $doorpocketslocation = null;
 protected $overheadconsole = null;
 protected $seatbackstorage = null;
 protected $intermittentfrontwipers = null;
 protected $onetouchwindows = null;
 protected $powerwindows = null;
 protected $daytimerunninglights = null;
 protected $headlightsautodelay = null;
 protected $headlightsdusksensor = null;
 protected $_1strowvanitymirrors = null;
 protected $exteriormirroradjustment = null;
 protected $antilockbrakingsystem = null;
 protected $brakingassist = null;
 protected $frontstabilizerbar = null;
 protected $frontsuspensionclassification = null;
 protected $independentsuspension = null;
 protected $rearstabilizerbar = null;
 protected $rearsuspensionclassification = null;
 protected $tailpipecover = null;
 protected $wheellockkitsteelwheels = null;
 protected $rearbumperapplique = null;
 protected $splashguards = null;
 protected $autodimmingmirrorwapproachlighting = null;
 protected $bodysidemolding = null;
 protected $bodysidemoldingkit = null;
 protected $foglampkitlegacy = null;
 protected $remoteenginestarterkeystart = null;

 function __construct ( Array $carInfo) {
  parent::__construct ( self::MODEL, $carInfo);
 }

 function getId() {
  return $this->id;
 }

 function getDistancedriven() {
  return $this->distancedriven;
 }

 function getFueltype() {
  return $this->fueltype;
 }

 function getTransmission() {
  return $this->transmission;
 }

 function getDoors() {
  return $this->doors;
 }

 function getBodytype() {
  return $this->bodytype;
 }

 function getWidth() {
  return $this->width;
 }

 function getHeight() {
  return $this->height;
 }

 function getLength() {
  return $this->length;
 }

 function get_0to100kmhtime() {
  return $this->_0to100kmhtime;
 }

 function get_0to60mphtime() {
  return $this->_0to60mphtime;
 }

 function getDisplacement() {
  return $this->displacement;
 }

 function getDisaplacement_measure() {
  return $this->disaplacement_measure;
 }

 function getTopspeed() {
  return $this->topspeed;
 }

 function getTopspeed_measure() {
  return $this->topspeed_measure;
 }

 function getHorsepower() {
  return $this->horsepower;
 }

 function getCity_consumption() {
  return $this->city_consumption;
 }

 function getHighway_consumption() {
  return $this->highway_consumption;
 }

 function getCombined_consumption() {
  return $this->combined_consumption;
 }

 function getFuel_consumption() {
  return $this->fuel_consumption;
 }

 function getCo2emissions() {
  return $this->co2emissions;
 }

 function getEngine_size() {
  return $this->engine_size;
 }

 function getSeatingcapacity() {
  return $this->seatingcapacity;
 }

 function getTransmission_shifts() {
  return $this->transmission_shifts;
 }

 function getDrivetype() {
  return $this->drivetype;
 }

 function getTirewheelsize() {
  return $this->tirewheelsize;
 }

 function getTirewheelsize_measure() {
  return $this->tirewheelsize_measure;
 }

 function getCountryorigin_id() {
  return $this->countryorigin_id;
 }

 function getCountryassembly_id() {
  return $this->countryassembly_id;
 }

 function getTorque() {
  return $this->torque;
 }

 function getTorque_measure() {
  return $this->torque_measure;
 }

 function getCurbweight() {
  return $this->curbweight;
 }

 function getCurbweight_measure() {
  return $this->curbweight_measure;
 }

 function getHeadairbags() {
  return $this->headairbags;
 }

 function getHipairbags() {
  return $this->hipairbags;
 }

 function getPassengerairbagdeactivation() {
  return $this->passengerairbagdeactivation;
 }

 function getSidesirbags() {
  return $this->sidesirbags;
 }

 function getSidecurtainairbagrolloversensor() {
  return $this->sidecurtainairbagrolloversensor;
 }

 function getPostcollisionsafetysystem() {
  return $this->postcollisionsafetysystem;
 }

 function get_2ndrowcenterseatbelt() {
  return $this->_2ndrowcenterseatbelt;
 }

 function getBluetooth() {
  return $this->bluetooth;
 }

 function getAudio_cdmp3playback() {
  return $this->audio_cdmp3playback;
 }

 function getAudio_cdplayer() {
  return $this->audio_cdplayer;
 }

 function getAudio_auxaudioinputs() {
  return $this->audio_auxaudioinputs;
 }

 function getAudio_usbinputs() {
  return $this->audio_usbinputs;
 }

 function getAudio_digitalaudioinput() {
  return $this->audio_digitalaudioinput;
 }

 function getAudio_radio() {
  return $this->audio_radio;
 }

 function getAudio_totalnumberofspeakers() {
  return $this->audio_totalnumberofspeakers;
 }

 function getAudio_usbconnection() {
  return $this->audio_usbconnection;
 }

 function getDriverseat_heightadjustable() {
  return $this->driverseat_heightadjustable;
 }

 function getSunshade() {
  return $this->sunshade;
 }

 function getCargonettrunkrear() {
  return $this->cargonettrunkrear;
 }

 function getAllweatherfloormats() {
  return $this->allweatherfloormats;
 }

 function getCargonetside2nets() {
  return $this->cargonetside2nets;
 }

 function getCargotray() {
  return $this->cargotray;
 }

 function getLeathershiftknob() {
  return $this->leathershiftknob;
 }

 function getTweeterkit() {
  return $this->tweeterkit;
 }

 function getMetalpedalpadsetatsti() {
  return $this->metalpedalpadsetatsti;
 }

 function getAutodimmingmirrorwcompass() {
  return $this->autodimmingmirrorwcompass;
 }

 function getAutodimmingmirrorwcompassandhomelink() {
  return $this->autodimmingmirrorwcompassandhomelink;
 }

 function getAudiocontrolsonsteeringwheel() {
  return $this->audiocontrolsonsteeringwheel;
 }

 function getCruisecontrolsonsteeringwheel() {
  return $this->cruisecontrolsonsteeringwheel;
 }

 function getPhonecontrolsonsteeringwheel() {
  return $this->phonecontrolsonsteeringwheel;
 }

 function getSteeringwheeladjustments() {
  return $this->steeringwheeladjustments;
 }

 function getTransmissioncontrolsonsteeringwheel() {
  return $this->transmissioncontrolsonsteeringwheel;
 }

 function getNumberofpassengerseatmanualadjustments() {
  return $this->numberofpassengerseatmanualadjustments;
 }

 function getAdjustableseatheadrest() {
  return $this->adjustableseatheadrest;
 }

 function getSeatwhiplashprotection() {
  return $this->seatwhiplashprotection;
 }

 function getAdjustable2ndrowheadrests() {
  return $this->adjustable2ndrowheadrests;
 }

 function getFolding2ndrow() {
  return $this->folding2ndrow;
 }

 function get_2ndrowcenterarmrest() {
  return $this->_2ndrowcenterarmrest;
 }

 function get_1strowupholstery() {
  return $this->_1strowupholstery;
 }

 function getClock() {
  return $this->clock;
 }

 function getExternaltemperaturegauge() {
  return $this->externaltemperaturegauge;
 }

 function getTachometer() {
  return $this->tachometer;
 }

 function getTirepressuremonitoringsystem() {
  return $this->tirepressuremonitoringsystem;
 }

 function getTripcomputer() {
  return $this->tripcomputer;
 }

 function getAirfiltration() {
  return $this->airfiltration;
 }

 function getFrontairconditioning() {
  return $this->frontairconditioning;
 }

 function getFrontairconditioningzones() {
  return $this->frontairconditioningzones;
 }

 function getPoweroutlets() {
  return $this->poweroutlets;
 }

 function getCargotiedowns() {
  return $this->cargotiedowns;
 }

 function getCenterconsole() {
  return $this->centerconsole;
 }

 function getCupholderslocation() {
  return $this->cupholderslocation;
 }

 function getDoorpocketslocation() {
  return $this->doorpocketslocation;
 }

 function getOverheadconsole() {
  return $this->overheadconsole;
 }

 function getSeatbackstorage() {
  return $this->seatbackstorage;
 }

 function getIntermittentfrontwipers() {
  return $this->intermittentfrontwipers;
 }

 function getOnetouchwindows() {
  return $this->onetouchwindows;
 }

 function getPowerwindows() {
  return $this->powerwindows;
 }

 function getDaytimerunninglights() {
  return $this->daytimerunninglights;
 }

 function getHeadlightsautodelay() {
  return $this->headlightsautodelay;
 }

 function getHeadlightsdusksensor() {
  return $this->headlightsdusksensor;
 }

 function get_1strowvanitymirrors() {
  return $this->_1strowvanitymirrors;
 }

 function getExteriormirroradjustment() {
  return $this->exteriormirroradjustment;
 }

 function getAntilockbrakingsystem() {
  return $this->antilockbrakingsystem;
 }

 function getBrakingassist() {
  return $this->brakingassist;
 }

 function getFrontstabilizerbar() {
  return $this->frontstabilizerbar;
 }

 function getFrontsuspensionclassification() {
  return $this->frontsuspensionclassification;
 }

 function getIndependentsuspension() {
  return $this->independentsuspension;
 }

 function getRearstabilizerbar() {
  return $this->rearstabilizerbar;
 }

 function getRearsuspensionclassification() {
  return $this->rearsuspensionclassification;
 }

 function getTailpipecover() {
  return $this->tailpipecover;
 }

 function getWheellockkitsteelwheels() {
  return $this->wheellockkitsteelwheels;
 }

 function getRearbumperapplique() {
  return $this->rearbumperapplique;
 }

 function getSplashguards() {
  return $this->splashguards;
 }

 function getAutodimmingmirrorwapproachlighting() {
  return $this->autodimmingmirrorwapproachlighting;
 }

 function getBodysidemolding() {
  return $this->bodysidemolding;
 }

 function getBodysidemoldingkit() {
  return $this->bodysidemoldingkit;
 }

 function getFoglampkitlegacy() {
  return $this->foglampkitlegacy;
 }

 function getRemoteenginestarterkeystart() {
  return $this->remoteenginestarterkeystart;
 }

 function setId($id) : CarsModel {
  $this->id = $id;
  return $this;
 }

 function setDistancedriven($distancedriven) : CarsModel {
  $this->distancedriven = $distancedriven;
  return $this;
 }

 function setFueltype($fueltype) : CarsModel {
  $this->fueltype = $fueltype;
  return $this;
 }

 function setTransmission($transmission) : CarsModel {
  $this->transmission = $transmission;
  return $this;
 }

 function setDoors($doors) : CarsModel {
  $this->doors = $doors;
  return $this;
 }

 function setBodytype($bodytype) : CarsModel {
  $this->bodytype = $bodytype;
  return $this;
 }

 function setWidth($width) : CarsModel {
  $this->width = $width;
  return $this;
 }

 function setHeight($height) : CarsModel {
  $this->height = $height;
  return $this;
 }

 function setLength($length) : CarsModel {
  $this->length = $length;
  return $this;
 }

 function set_0to100kmhtime($_0to100kmhtime) : CarsModel {
  $this->_0to100kmhtime = $_0to100kmhtime;
  return $this;
 }

 function set_0to60mphtime($_0to60mphtime) : CarsModel {
  $this->_0to60mphtime = $_0to60mphtime;
  return $this;
 }

 function setDisplacement($displacement) : CarsModel {
  $this->displacement = $displacement;
  return $this;
 }

 function setDisaplacement_measure($disaplacement_measure) : CarsModel {
  $this->disaplacement_measure = $disaplacement_measure;
  return $this;
 }

 function setTopspeed($topspeed) : CarsModel {
  $this->topspeed = $topspeed;
  return $this;
 }

 function setTopspeed_measure($topspeed_measure) : CarsModel {
  $this->topspeed_measure = $topspeed_measure;
  return $this;
 }

 function setHorsepower($horsepower) : CarsModel {
  $this->horsepower = $horsepower;
  return $this;
 }

 function setCity_consumption($city_consumption) : CarsModel {
  $this->city_consumption = $city_consumption;
  return $this;
 }

 function setHighway_consumption($highway_consumption) : CarsModel {
  $this->highway_consumption = $highway_consumption;
  return $this;
 }

 function setCombined_consumption($combined_consumption) : CarsModel {
  $this->combined_consumption = $combined_consumption;
  return $this;
 }

 function setFuel_consumption($fuel_consumption) : CarsModel {
  $this->fuel_consumption = $fuel_consumption;
  return $this;
 }

 function setCo2emissions($co2emissions) : CarsModel {
  $this->co2emissions = $co2emissions;
  return $this;
 }

 function setEngine_size($engine_size) : CarsModel {
  $this->engine_size = $engine_size;
  return $this;
 }

 function setSeatingcapacity($seatingcapacity) : CarsModel {
  $this->seatingcapacity = $seatingcapacity;
  return $this;
 }

 function setTransmission_shifts($transmission_shifts) : CarsModel {
  $this->transmission_shifts = $transmission_shifts;
  return $this;
 }

 function setDrivetype($drivetype) : CarsModel {
  $this->drivetype = $drivetype;
  return $this;
 }

 function setTirewheelsize($tirewheelsize) : CarsModel {
  $this->tirewheelsize = $tirewheelsize;
  return $this;
 }

 function setTirewheelsize_measure($tirewheelsize_measure) : CarsModel {
  $this->tirewheelsize_measure = $tirewheelsize_measure;
  return $this;
 }

 function setCountryorigin_id($countryorigin_id) : CarsModel {
  $this->countryorigin_id = $countryorigin_id;
  return $this;
 }

 function setCountryassembly_id($countryassembly_id) : CarsModel {
  $this->countryassembly_id = $countryassembly_id;
  return $this;
 }

 function setTorque($torque) : CarsModel {
  $this->torque = $torque;
  return $this;
 }

 function setTorque_measure($torque_measure) : CarsModel {
  $this->torque_measure = $torque_measure;
  return $this;
 }

 function setCurbweight($curbweight) : CarsModel {
  $this->curbweight = $curbweight;
  return $this;
 }

 function setCurbweight_measure($curbweight_measure) : CarsModel {
  $this->curbweight_measure = $curbweight_measure;
  return $this;
 }

 function setHeadairbags($headairbags) : CarsModel {
  $this->headairbags = $headairbags;
  return $this;
 }

 function setHipairbags($hipairbags) : CarsModel {
  $this->hipairbags = $hipairbags;
  return $this;
 }

 function setPassengerairbagdeactivation($passengerairbagdeactivation) : CarsModel {
  $this->passengerairbagdeactivation = $passengerairbagdeactivation;
  return $this;
 }

 function setSidesirbags($sidesirbags) : CarsModel {
  $this->sidesirbags = $sidesirbags;
  return $this;
 }

 function setSidecurtainairbagrolloversensor($sidecurtainairbagrolloversensor) : CarsModel {
  $this->sidecurtainairbagrolloversensor = $sidecurtainairbagrolloversensor;
  return $this;
 }

 function setPostcollisionsafetysystem($postcollisionsafetysystem) : CarsModel {
  $this->postcollisionsafetysystem = $postcollisionsafetysystem;
  return $this;
 }

 function set_2ndrowcenterseatbelt($_2ndrowcenterseatbelt) : CarsModel {
  $this->_2ndrowcenterseatbelt = $_2ndrowcenterseatbelt;
  return $this;
 }

 function setBluetooth($bluetooth) : CarsModel {
  $this->bluetooth = $bluetooth;
  return $this;
 }

 function setAudio_cdmp3playback($audio_cdmp3playback) : CarsModel {
  $this->audio_cdmp3playback = $audio_cdmp3playback;
  return $this;
 }

 function setAudio_cdplayer($audio_cdplayer) : CarsModel {
  $this->audio_cdplayer = $audio_cdplayer;
  return $this;
 }

 function setAudio_auxaudioinputs($audio_auxaudioinputs) : CarsModel {
  $this->audio_auxaudioinputs = $audio_auxaudioinputs;
  return $this;
 }

 function setAudio_usbinputs($audio_usbinputs) : CarsModel {
  $this->audio_usbinputs = $audio_usbinputs;
  return $this;
 }

 function setAudio_digitalaudioinput($audio_digitalaudioinput) : CarsModel {
  $this->audio_digitalaudioinput = $audio_digitalaudioinput;
  return $this;
 }

 function setAudio_radio($audio_radio) : CarsModel {
  $this->audio_radio = $audio_radio;
  return $this;
 }

 function setAudio_totalnumberofspeakers($audio_totalnumberofspeakers) : CarsModel {
  $this->audio_totalnumberofspeakers = $audio_totalnumberofspeakers;
  return $this;
 }

 function setAudio_usbconnection($audio_usbconnection) : CarsModel {
  $this->audio_usbconnection = $audio_usbconnection;
  return $this;
 }

 function setDriverseat_heightadjustable($driverseat_heightadjustable) : CarsModel {
  $this->driverseat_heightadjustable = $driverseat_heightadjustable;
  return $this;
 }

 function setSunshade($sunshade) : CarsModel {
  $this->sunshade = $sunshade;
  return $this;
 }

 function setCargonettrunkrear($cargonettrunkrear) : CarsModel {
  $this->cargonettrunkrear = $cargonettrunkrear;
  return $this;
 }

 function setAllweatherfloormats($allweatherfloormats) : CarsModel {
  $this->allweatherfloormats = $allweatherfloormats;
  return $this;
 }

 function setCargonetside2nets($cargonetside2nets) : CarsModel {
  $this->cargonetside2nets = $cargonetside2nets;
  return $this;
 }

 function setCargotray($cargotray) : CarsModel {
  $this->cargotray = $cargotray;
  return $this;
 }

 function setLeathershiftknob($leathershiftknob) : CarsModel {
  $this->leathershiftknob = $leathershiftknob;
  return $this;
 }

 function setTweeterkit($tweeterkit) : CarsModel {
  $this->tweeterkit = $tweeterkit;
  return $this;
 }

 function setMetalpedalpadsetatsti($metalpedalpadsetatsti) : CarsModel {
  $this->metalpedalpadsetatsti = $metalpedalpadsetatsti;
  return $this;
 }

 function setAutodimmingmirrorwcompass($autodimmingmirrorwcompass) : CarsModel {
  $this->autodimmingmirrorwcompass = $autodimmingmirrorwcompass;
  return $this;
 }

 function setAutodimmingmirrorwcompassandhomelink($autodimmingmirrorwcompassandhomelink) : CarsModel {
  $this->autodimmingmirrorwcompassandhomelink = $autodimmingmirrorwcompassandhomelink;
  return $this;
 }

 function setAudiocontrolsonsteeringwheel($audiocontrolsonsteeringwheel) : CarsModel {
  $this->audiocontrolsonsteeringwheel = $audiocontrolsonsteeringwheel;
  return $this;
 }

 function setCruisecontrolsonsteeringwheel($cruisecontrolsonsteeringwheel) : CarsModel {
  $this->cruisecontrolsonsteeringwheel = $cruisecontrolsonsteeringwheel;
  return $this;
 }

 function setPhonecontrolsonsteeringwheel($phonecontrolsonsteeringwheel) : CarsModel {
  $this->phonecontrolsonsteeringwheel = $phonecontrolsonsteeringwheel;
  return $this;
 }

 function setSteeringwheeladjustments($steeringwheeladjustments) : CarsModel {
  $this->steeringwheeladjustments = $steeringwheeladjustments;
  return $this;
 }

 function setTransmissioncontrolsonsteeringwheel($transmissioncontrolsonsteeringwheel) : CarsModel {
  $this->transmissioncontrolsonsteeringwheel = $transmissioncontrolsonsteeringwheel;
  return $this;
 }

 function setNumberofpassengerseatmanualadjustments($numberofpassengerseatmanualadjustments) : CarsModel {
  $this->numberofpassengerseatmanualadjustments = $numberofpassengerseatmanualadjustments;
  return $this;
 }

 function setAdjustableseatheadrest($adjustableseatheadrest) : CarsModel {
  $this->adjustableseatheadrest = $adjustableseatheadrest;
  return $this;
 }

 function setSeatwhiplashprotection($seatwhiplashprotection) : CarsModel {
  $this->seatwhiplashprotection = $seatwhiplashprotection;
  return $this;
 }

 function setAdjustable2ndrowheadrests($adjustable2ndrowheadrests) : CarsModel {
  $this->adjustable2ndrowheadrests = $adjustable2ndrowheadrests;
  return $this;
 }

 function setFolding2ndrow($folding2ndrow) : CarsModel {
  $this->folding2ndrow = $folding2ndrow;
  return $this;
 }

 function set_2ndrowcenterarmrest($_2ndrowcenterarmrest) : CarsModel {
  $this->_2ndrowcenterarmrest = $_2ndrowcenterarmrest;
  return $this;
 }

 function set_1strowupholstery($_1strowupholstery) : CarsModel {
  $this->_1strowupholstery = $_1strowupholstery;
  return $this;
 }

 function setClock($clock) : CarsModel {
  $this->clock = $clock;
  return $this;
 }

 function setExternaltemperaturegauge($externaltemperaturegauge) : CarsModel {
  $this->externaltemperaturegauge = $externaltemperaturegauge;
  return $this;
 }

 function setTachometer($tachometer) : CarsModel {
  $this->tachometer = $tachometer;
  return $this;
 }

 function setTirepressuremonitoringsystem($tirepressuremonitoringsystem) : CarsModel {
  $this->tirepressuremonitoringsystem = $tirepressuremonitoringsystem;
  return $this;
 }

 function setTripcomputer($tripcomputer) : CarsModel {
  $this->tripcomputer = $tripcomputer;
  return $this;
 }

 function setAirfiltration($airfiltration) : CarsModel {
  $this->airfiltration = $airfiltration;
  return $this;
 }

 function setFrontairconditioning($frontairconditioning) : CarsModel {
  $this->frontairconditioning = $frontairconditioning;
  return $this;
 }

 function setFrontairconditioningzones($frontairconditioningzones) : CarsModel {
  $this->frontairconditioningzones = $frontairconditioningzones;
  return $this;
 }

 function setPoweroutlets($poweroutlets) : CarsModel {
  $this->poweroutlets = $poweroutlets;
  return $this;
 }

 function setCargotiedowns($cargotiedowns) : CarsModel {
  $this->cargotiedowns = $cargotiedowns;
  return $this;
 }

 function setCenterconsole($centerconsole) : CarsModel {
  $this->centerconsole = $centerconsole;
  return $this;
 }

 function setCupholderslocation($cupholderslocation) : CarsModel {
  $this->cupholderslocation = $cupholderslocation;
  return $this;
 }

 function setDoorpocketslocation($doorpocketslocation) : CarsModel {
  $this->doorpocketslocation = $doorpocketslocation;
  return $this;
 }

 function setOverheadconsole($overheadconsole) : CarsModel {
  $this->overheadconsole = $overheadconsole;
  return $this;
 }

 function setSeatbackstorage($seatbackstorage) : CarsModel {
  $this->seatbackstorage = $seatbackstorage;
  return $this;
 }

 function setIntermittentfrontwipers($intermittentfrontwipers) : CarsModel {
  $this->intermittentfrontwipers = $intermittentfrontwipers;
  return $this;
 }

 function setOnetouchwindows($onetouchwindows) : CarsModel {
  $this->onetouchwindows = $onetouchwindows;
  return $this;
 }

 function setPowerwindows($powerwindows) : CarsModel {
  $this->powerwindows = $powerwindows;
  return $this;
 }

 function setDaytimerunninglights($daytimerunninglights) : CarsModel {
  $this->daytimerunninglights = $daytimerunninglights;
  return $this;
 }

 function setHeadlightsautodelay($headlightsautodelay) : CarsModel {
  $this->headlightsautodelay = $headlightsautodelay;
  return $this;
 }

 function setHeadlightsdusksensor($headlightsdusksensor) : CarsModel {
  $this->headlightsdusksensor = $headlightsdusksensor;
  return $this;
 }

 function set_1strowvanitymirrors($_1strowvanitymirrors) : CarsModel {
  $this->_1strowvanitymirrors = $_1strowvanitymirrors;
  return $this;
 }

 function setExteriormirroradjustment($exteriormirroradjustment) : CarsModel {
  $this->exteriormirroradjustment = $exteriormirroradjustment;
  return $this;
 }

 function setAntilockbrakingsystem($antilockbrakingsystem) : CarsModel {
  $this->antilockbrakingsystem = $antilockbrakingsystem;
  return $this;
 }

 function setBrakingassist($brakingassist) : CarsModel {
  $this->brakingassist = $brakingassist;
  return $this;
 }

 function setFrontstabilizerbar($frontstabilizerbar) : CarsModel {
  $this->frontstabilizerbar = $frontstabilizerbar;
  return $this;
 }

 function setFrontsuspensionclassification($frontsuspensionclassification) : CarsModel {
  $this->frontsuspensionclassification = $frontsuspensionclassification;
  return $this;
 }

 function setIndependentsuspension($independentsuspension) : CarsModel {
  $this->independentsuspension = $independentsuspension;
  return $this;
 }

 function setRearstabilizerbar($rearstabilizerbar) : CarsModel {
  $this->rearstabilizerbar = $rearstabilizerbar;
  return $this;
 }

 function setRearsuspensionclassification($rearsuspensionclassification) : CarsModel {
  $this->rearsuspensionclassification = $rearsuspensionclassification;
  return $this;
 }

 function setTailpipecover($tailpipecover) : CarsModel {
  $this->tailpipecover = $tailpipecover;
  return $this;
 }

 function setWheellockkitsteelwheels($wheellockkitsteelwheels) : CarsModel {
  $this->wheellockkitsteelwheels = $wheellockkitsteelwheels;
  return $this;
 }

 function setRearbumperapplique($rearbumperapplique) : CarsModel {
  $this->rearbumperapplique = $rearbumperapplique;
  return $this;
 }

 function setSplashguards($splashguards) : CarsModel {
  $this->splashguards = $splashguards;
  return $this;
 }

 function setAutodimmingmirrorwapproachlighting($autodimmingmirrorwapproachlighting) : CarsModel {
  $this->autodimmingmirrorwapproachlighting = $autodimmingmirrorwapproachlighting;
  return $this;
 }

 function setBodysidemolding($bodysidemolding) : CarsModel {
  $this->bodysidemolding = $bodysidemolding;
  return $this;
 }

 function setBodysidemoldingkit($bodysidemoldingkit) : CarsModel {
  $this->bodysidemoldingkit = $bodysidemoldingkit;
  return $this;
 }

 function setFoglampkitlegacy($foglampkitlegacy) : CarsModel {
  $this->foglampkitlegacy = $foglampkitlegacy;
  return $this;
 }

 function setRemoteenginestarterkeystart($remoteenginestarterkeystart) : CarsModel {
  $this->remoteenginestarterkeystart = $remoteenginestarterkeystart;
  return $this;
 }
}
?>