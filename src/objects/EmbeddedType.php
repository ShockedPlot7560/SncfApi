<?php

namespace ShockedPlot7560\SncfApi\objects;

enum EmbeddedType : string {
	case STOP_AREA = "stop_area";
	case ADMINISTRATIVE_REGION = "administrative_region";
	case ADDRESS = "address";
	case POI = "poi";
	case STOP_POINT = "stop_point";
}
