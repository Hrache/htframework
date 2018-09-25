<?php
class AcsCars111FieldsTblModel extends MySQLModelAbstract   {
	use ModelsTrait;
	const MODEL = 'acs_cars_111_fields_tbl';
	const id = 'id';
	const distancedriven = 'distancedriven';
	const fueltype = 'fueltype';
	const transmission = 'transmission';
	const doors = 'doors';
	const bodytype = 'bodytype';
	const width = 'width';
	const height = 'height';
	const length = 'length';
	const _0to100kmhtime = '_0to100kmhtime';
	const _0to60mphtime = '_0to60mphtime';
	const displacement = 'displacement';
	const disaplacement_measure = 'disaplacement_measure';
	const topspeed = 'topspeed';
	const topspeed_measure = 'topspeed_measure';
	const horsepower = 'horsepower';
	const city_consumption = 'city_consumption';
	const highway_consumption = 'highway_consumption';
	const combined_consumption = 'combined_consumption';
	const fuel_consumption = 'fuel_consumption';
	const co2emissions = 'co2emissions';
	const engine_size = 'engine_size';
	const seatingcapacity = 'seatingcapacity';
	const transmission_shifts = 'transmission_shifts';
	const drivetype = 'drivetype';
	const tirewheelsize = 'tirewheelsize';
	const tirewheelsize_measure = 'tirewheelsize_measure';
	const countryorigin_id = 'countryorigin_id';
	const countryassembly_id = 'countryassembly_id';
	const torque = 'torque';
	const torque_measure = 'torque_measure';
	const curbweight = 'curbweight';
	const curbweight_measure = 'curbweight_measure';
	const audio_totalnumberofspeakers = 'audio_totalnumberofspeakers';
	const headairbags = 'headairbags';
	const hipairbags = 'hipairbags';
	const passengerairbagdeactivation = 'passengerairbagdeactivation';
	const sidesirbags = 'sidesirbags';
	const sidecurtainairbagrolloversensor = 'sidecurtainairbagrolloversensor';
	const postcollisionsafetysystem = 'postcollisionsafetysystem';
	const _2ndrowcenterseatbelt = '_2ndrowcenterseatbelt';
	const bluetooth = 'bluetooth';
	const audio_cdmp3playback = 'audio_cdmp3playback';
	const audio_cdplayer = 'audio_cdplayer';
	const audio_auxaudioinputs = 'audio_auxaudioinputs';
	const audio_usbinputs = 'audio_usbinputs';
	const audio_digitalaudioinput = 'audio_digitalaudioinput';
	const audio_radio = 'audio_radio';
	const audio_usbconnection = 'audio_usbconnection';
	const driverseat_heightadjustable = 'driverseat_heightadjustable';
	const sunshade = 'sunshade';
	const cargonettrunkrear = 'cargonettrunkrear';
	const allweatherfloormats = 'allweatherfloormats';
	const cargonetside2nets = 'cargonetside2nets';
	const cargotray = 'cargotray';
	const leathershiftknob = 'leathershiftknob';
	const tweeterkit = 'tweeterkit';
	const metalpedalpadsetatsti = 'metalpedalpadsetatsti';
	const autodimmingmirrorwcompass = 'autodimmingmirrorwcompass';
	const autodimmingmirrorwcompassandhomelink = 'autodimmingmirrorwcompassandhomelink';
	const audiocontrolsonsteeringwheel = 'audiocontrolsonsteeringwheel';
	const cruisecontrolsonsteeringwheel = 'cruisecontrolsonsteeringwheel';
	const phonecontrolsonsteeringwheel = 'phonecontrolsonsteeringwheel';
	const steeringwheeladjustments = 'steeringwheeladjustments';
	const transmissioncontrolsonsteeringwheel = 'transmissioncontrolsonsteeringwheel';
	const numberofpassengerseatmanualadjustments = 'numberofpassengerseatmanualadjustments';
	const adjustableseatheadrest = 'adjustableseatheadrest';
	const seatwhiplashprotection = 'seatwhiplashprotection';
	const adjustable2ndrowheadrests = 'adjustable2ndrowheadrests';
	const folding2ndrow = 'folding2ndrow';
	const _2ndrowcenterarmrest = '_2ndrowcenterarmrest';
	const _1strowupholstery = '_1strowupholstery';
	const clock = 'clock';
	const externaltemperaturegauge = 'externaltemperaturegauge';
	const tachometer = 'tachometer';
	const tirepressuremonitoringsystem = 'tirepressuremonitoringsystem';
	const tripcomputer = 'tripcomputer';
	const airfiltration = 'airfiltration';
	const frontairconditioning = 'frontairconditioning';
	const frontairconditioningzones = 'frontairconditioningzones';
	const poweroutlets = 'poweroutlets';
	const cargotiedowns = 'cargotiedowns';
	const centerconsole = 'centerconsole';
	const cupholderslocation = 'cupholderslocation';
	const doorpocketslocation = 'doorpocketslocation';
	const overheadconsole = 'overheadconsole';
	const seatbackstorage = 'seatbackstorage';
	const intermittentfrontwipers = 'intermittentfrontwipers';
	const onetouchwindows = 'onetouchwindows';
	const powerwindows = 'powerwindows';
	const daytimerunninglights = 'daytimerunninglights';
	const headlightsautodelay = 'headlightsautodelay';
	const headlightsdusksensor = 'headlightsdusksensor';
	const _1strowvanitymirrors = '_1strowvanitymirrors';
	const exteriormirroradjustment = 'exteriormirroradjustment';
	const antilockbrakingsystem = 'antilockbrakingsystem';
	const brakingassist = 'brakingassist';
	const frontstabilizerbar = 'frontstabilizerbar';
	const frontsuspensionclassification = 'frontsuspensionclassification';
	const independentsuspension = 'independentsuspension';
	const rearstabilizerbar = 'rearstabilizerbar';
	const rearsuspensionclassification = 'rearsuspensionclassification';
	const tailpipecover = 'tailpipecover';
	const wheellockkitsteelwheels = 'wheellockkitsteelwheels';
	const rearbumperapplique = 'rearbumperapplique';
	const splashguards = 'splashguards';
	const autodimmingmirrorwapproachlighting = 'autodimmingmirrorwapproachlighting';
	const bodysidemolding = 'bodysidemolding';
	const bodysidemoldingkit = 'bodysidemoldingkit';
	const foglampkitlegacy = 'foglampkitlegacy';
	const remoteenginestarterkeystart = 'remoteenginestarterkeystart';
	const rules = [
		self::id => [
			'type' => 'int',
			'null' => 'NO',
			'length' => '8',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::distancedriven => [
			'type' => 'mediumint',
			'null' => 'NO',
			'length' => '7',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::fueltype => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('patrol','lpggas','diesel','biofuel'),
			'type_extra' => '',
			'default' => 'patrol',
		],
		self::transmission => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('auto','manual','semi-auto','cvt'),
			'type_extra' => '',
			'default' => 'manual',
		],
		self::doors => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('0','2','3','4','5'),
			'type_extra' => '',
			'default' => '4',
		],
		self::bodytype => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('coupe','roadster','hatchback','pickup','combi','mpv','wagon','sedan','suv','convertible','vanminivan','truck'),
			'type_extra' => '',
			'default' => 'sedan',
		],
		self::width => [
			'type' => 'smallint',
			'null' => 'YES',
			'length' => '5',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::height => [
			'type' => 'smallint',
			'null' => 'YES',
			'length' => '5',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::length => [
			'type' => 'smallint',
			'null' => 'YES',
			'length' => '5',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::_0to100kmhtime => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '2',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::_0to60mphtime => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '2',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::displacement => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '5',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::disaplacement_measure => [
			'type' => 'enum',
			'null' => 'YES',
			'enum' => array('cc','ltr'),
			'type_extra' => '',
			'default' => 'ltr',
		],
		self::topspeed => [
			'type' => 'smallint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => '',
			'default' => '',
		],
		self::topspeed_measure => [
			'type' => 'enum',
			'null' => 'YES',
			'enum' => array('km/h','mph'),
			'type_extra' => '',
			'default' => 'km/h',
		],
		self::horsepower => [
			'type' => 'smallint',
			'null' => 'NO',
			'length' => '4',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::city_consumption => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::highway_consumption => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::combined_consumption => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::fuel_consumption => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::co2emissions => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::engine_size => [
			'type' => 'float',
			'null' => 'NO',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::seatingcapacity => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '2',
			'type_extra' => 'unsigned',
			'default' => '4',
		],
		self::transmission_shifts => [
			'type' => 'tinyint',
			'null' => 'NO',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '5',
		],
		self::drivetype => [
			'type' => 'enum',
			'null' => 'YES',
			'enum' => array('awd','fwd','rwd','4wd'),
			'type_extra' => '',
			'default' => 'fwd',
		],
		self::tirewheelsize => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::tirewheelsize_measure => [
			'type' => 'enum',
			'null' => 'YES',
			'enum' => array('in'),
			'type_extra' => '',
			'default' => 'in',
		],
		self::countryorigin_id => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::countryassembly_id => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::torque => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::torque_measure => [
			'type' => 'enum',
			'null' => 'YES',
			'enum' => array('ft-lbs'),
			'type_extra' => '',
			'default' => 'ft-lbs',
		],
		self::curbweight => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::curbweight_measure => [
			'type' => 'enum',
			'null' => 'YES',
			'enum' => array('lbs'),
			'type_extra' => '',
			'default' => 'lbs',
		],
		self::audio_totalnumberofspeakers => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '2',
			'type_extra' => '',
			'default' => '',
		],
		self::headairbags => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::hipairbags => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::passengerairbagdeactivation => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::sidesirbags => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::sidecurtainairbagrolloversensor => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::postcollisionsafetysystem => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::_2ndrowcenterseatbelt => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::bluetooth => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::audio_cdmp3playback => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::audio_cdplayer => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::audio_auxaudioinputs => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::audio_usbinputs => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::audio_digitalaudioinput => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::audio_radio => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::audio_usbconnection => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::driverseat_heightadjustable => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::sunshade => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::cargonettrunkrear => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::allweatherfloormats => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::cargonetside2nets => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::cargotray => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::leathershiftknob => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::tweeterkit => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::metalpedalpadsetatsti => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::autodimmingmirrorwcompass => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::autodimmingmirrorwcompassandhomelink => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::audiocontrolsonsteeringwheel => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::cruisecontrolsonsteeringwheel => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::phonecontrolsonsteeringwheel => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::steeringwheeladjustments => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::transmissioncontrolsonsteeringwheel => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::numberofpassengerseatmanualadjustments => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::adjustableseatheadrest => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::seatwhiplashprotection => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::adjustable2ndrowheadrests => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::folding2ndrow => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::_2ndrowcenterarmrest => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::_1strowupholstery => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::clock => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::externaltemperaturegauge => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::tachometer => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::tirepressuremonitoringsystem => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::tripcomputer => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::airfiltration => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::frontairconditioning => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::frontairconditioningzones => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::poweroutlets => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::cargotiedowns => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::centerconsole => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::cupholderslocation => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::doorpocketslocation => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::overheadconsole => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::seatbackstorage => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::intermittentfrontwipers => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::onetouchwindows => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::powerwindows => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::daytimerunninglights => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::headlightsautodelay => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::headlightsdusksensor => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::_1strowvanitymirrors => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::exteriormirroradjustment => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::antilockbrakingsystem => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::brakingassist => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::frontstabilizerbar => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::frontsuspensionclassification => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::independentsuspension => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::rearstabilizerbar => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::rearsuspensionclassification => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::tailpipecover => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::wheellockkitsteelwheels => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::rearbumperapplique => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::splashguards => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::autodimmingmirrorwapproachlighting => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::bodysidemolding => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::bodysidemoldingkit => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::foglampkitlegacy => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::remoteenginestarterkeystart => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
	];

	// int(8) unsigned
	protected $id;

	// mediumint(7) unsigned
	protected $distancedriven;

	// enum('patrol','lpggas','diesel','biofuel')
	protected $fueltype;

	// enum('auto','manual','semi-auto','cvt')
	protected $transmission;

	// enum('0','2','3','4','5')
	protected $doors;

	// enum('coupe','roadster','hatchback','pickup','combi','mpv','wagon','sedan','suv','convertible','vanminivan','truck')
	protected $bodytype;

	// smallint(5) unsigned
	protected $width;

	// smallint(5) unsigned
	protected $height;

	// smallint(5) unsigned
	protected $length;

	// tinyint(2) unsigned
	protected $_0to100kmhtime;

	// tinyint(2) unsigned
	protected $_0to60mphtime;

	// tinyint(5) unsigned
	protected $displacement;

	// enum('cc','ltr')
	protected $disaplacement_measure;

	// smallint(3)
	protected $topspeed;

	// enum('km/h','mph')
	protected $topspeed_measure;

	// smallint(4) unsigned
	protected $horsepower;

	// float unsigned
	protected $city_consumption;

	// float unsigned
	protected $highway_consumption;

	// float unsigned
	protected $combined_consumption;

	// float unsigned
	protected $fuel_consumption;

	// float unsigned
	protected $co2emissions;

	// float unsigned
	protected $engine_size;

	// tinyint(2) unsigned
	protected $seatingcapacity;

	// tinyint(1) unsigned
	protected $transmission_shifts;

	// enum('awd','fwd','rwd','4wd')
	protected $drivetype;

	// tinyint(1) unsigned
	protected $tirewheelsize;

	// enum('in')
	protected $tirewheelsize_measure;

	// tinyint(3) unsigned
	protected $countryorigin_id;

	// tinyint(3) unsigned
	protected $countryassembly_id;

	// tinyint(3) unsigned
	protected $torque;

	// enum('ft-lbs')
	protected $torque_measure;

	// tinyint(3) unsigned
	protected $curbweight;

	// enum('lbs')
	protected $curbweight_measure;

	// tinyint(2)
	protected $audio_totalnumberofspeakers;

	// tinyint(1) unsigned
	protected $headairbags;

	// tinyint(1) unsigned
	protected $hipairbags;

	// tinyint(1) unsigned
	protected $passengerairbagdeactivation;

	// tinyint(1) unsigned
	protected $sidesirbags;

	// tinyint(1) unsigned
	protected $sidecurtainairbagrolloversensor;

	// tinyint(1) unsigned
	protected $postcollisionsafetysystem;

	// tinyint(1) unsigned
	protected $_2ndrowcenterseatbelt;

	// tinyint(1) unsigned
	protected $bluetooth;

	// tinyint(1) unsigned
	protected $audio_cdmp3playback;

	// tinyint(1) unsigned
	protected $audio_cdplayer;

	// tinyint(1) unsigned
	protected $audio_auxaudioinputs;

	// tinyint(1) unsigned
	protected $audio_usbinputs;

	// tinyint(1) unsigned
	protected $audio_digitalaudioinput;

	// tinyint(1) unsigned
	protected $audio_radio;

	// tinyint(1) unsigned
	protected $audio_usbconnection;

	// tinyint(1) unsigned
	protected $driverseat_heightadjustable;

	// tinyint(1) unsigned
	protected $sunshade;

	// tinyint(1) unsigned
	protected $cargonettrunkrear;

	// tinyint(1) unsigned
	protected $allweatherfloormats;

	// tinyint(1) unsigned
	protected $cargonetside2nets;

	// tinyint(1) unsigned
	protected $cargotray;

	// tinyint(1) unsigned
	protected $leathershiftknob;

	// tinyint(1) unsigned
	protected $tweeterkit;

	// tinyint(1) unsigned
	protected $metalpedalpadsetatsti;

	// tinyint(1) unsigned
	protected $autodimmingmirrorwcompass;

	// tinyint(1) unsigned
	protected $autodimmingmirrorwcompassandhomelink;

	// tinyint(1) unsigned
	protected $audiocontrolsonsteeringwheel;

	// tinyint(1) unsigned
	protected $cruisecontrolsonsteeringwheel;

	// tinyint(1) unsigned
	protected $phonecontrolsonsteeringwheel;

	// tinyint(1) unsigned
	protected $steeringwheeladjustments;

	// tinyint(1) unsigned
	protected $transmissioncontrolsonsteeringwheel;

	// tinyint(1) unsigned
	protected $numberofpassengerseatmanualadjustments;

	// tinyint(1) unsigned
	protected $adjustableseatheadrest;

	// tinyint(1) unsigned
	protected $seatwhiplashprotection;

	// tinyint(1) unsigned
	protected $adjustable2ndrowheadrests;

	// tinyint(1) unsigned
	protected $folding2ndrow;

	// tinyint(1) unsigned
	protected $_2ndrowcenterarmrest;

	// tinyint(1) unsigned
	protected $_1strowupholstery;

	// tinyint(1) unsigned
	protected $clock;

	// tinyint(1) unsigned
	protected $externaltemperaturegauge;

	// tinyint(1) unsigned
	protected $tachometer;

	// tinyint(1) unsigned
	protected $tirepressuremonitoringsystem;

	// tinyint(1) unsigned
	protected $tripcomputer;

	// tinyint(1) unsigned
	protected $airfiltration;

	// tinyint(1) unsigned
	protected $frontairconditioning;

	// tinyint(1) unsigned
	protected $frontairconditioningzones;

	// tinyint(1) unsigned
	protected $poweroutlets;

	// tinyint(1) unsigned
	protected $cargotiedowns;

	// tinyint(1) unsigned
	protected $centerconsole;

	// tinyint(1) unsigned
	protected $cupholderslocation;

	// tinyint(1) unsigned
	protected $doorpocketslocation;

	// tinyint(1) unsigned
	protected $overheadconsole;

	// tinyint(1) unsigned
	protected $seatbackstorage;

	// tinyint(1) unsigned
	protected $intermittentfrontwipers;

	// tinyint(1) unsigned
	protected $onetouchwindows;

	// tinyint(1) unsigned
	protected $powerwindows;

	// tinyint(1) unsigned
	protected $daytimerunninglights;

	// tinyint(1) unsigned
	protected $headlightsautodelay;

	// tinyint(1) unsigned
	protected $headlightsdusksensor;

	// tinyint(1) unsigned
	protected $_1strowvanitymirrors;

	// tinyint(1) unsigned
	protected $exteriormirroradjustment;

	// tinyint(1) unsigned
	protected $antilockbrakingsystem;

	// tinyint(1) unsigned
	protected $brakingassist;

	// tinyint(1) unsigned
	protected $frontstabilizerbar;

	// tinyint(1) unsigned
	protected $frontsuspensionclassification;

	// tinyint(1) unsigned
	protected $independentsuspension;

	// tinyint(1) unsigned
	protected $rearstabilizerbar;

	// tinyint(1) unsigned
	protected $rearsuspensionclassification;

	// tinyint(1) unsigned
	protected $tailpipecover;

	// tinyint(1) unsigned
	protected $wheellockkitsteelwheels;

	// tinyint(1) unsigned
	protected $rearbumperapplique;

	// tinyint(1) unsigned
	protected $splashguards;

	// tinyint(1) unsigned
	protected $autodimmingmirrorwapproachlighting;

	// tinyint(1) unsigned
	protected $bodysidemolding;

	// tinyint(1) unsigned
	protected $bodysidemoldingkit;

	// tinyint(1) unsigned
	protected $foglampkitlegacy;

	// tinyint(1) unsigned
	protected $remoteenginestarterkeystart;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}
}
?>