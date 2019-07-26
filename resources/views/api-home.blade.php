@extends('layouts.app')

@section('custom-styles')
<link href="{{ url('css/api.css?v=3') }}" rel="stylesheet">
<link href="{{ url('css/bsform.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="kia__body">
		<h2 class="kia__h2">Basic call structure</h2>
		<p>There are two types of end-points - one is for retrieving KI metadata, and another for retrieveing actual KI data. The following SDMX response formats are supported in this API.</p>
		<h2 class="kia__h4">XML format:</h2>
		<p class="kia__h4-sub">By default, requests are downloaded as .XML files. To attempt to view XML code in the browser, append the <code class="highlighted">format=xml</code> URL parmeter on the SDMX data query request</p>
		<h2 class="kia__h4">JSON format:</h2>
		<p class="kia__h4-sub">To request data in JSON format, just append the <code class="highlighted">format=json</code> parmeter on the SDMX data query request</p>
	</div>
	<div class="kia__body">
		<h2 class="kia__h2">Metadata end-points</h2>
		<p>Metadata provides users with more information about the data structures such as data sources, units of measurement, or frequency, just to name a few.</p>
		<div class="kia__call">
			<div class="kia__call--header">Dataflow</div>
			<div class="kia__call--description">Retrieves the unique dataset code for the KI dataset. - <span class="kia__link">View More <i class="fas fa-caret-down"></i></span></div>
			<div class="kia__well">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text get">GET &nbsp;{{url()}}</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="v1/sdmx/dataflow">
				  <div class="input-group-append">
				    <span class="input-group-text kia__copy">Copy &nbsp;<i class="fas fa-clipboard"></i></span>
				  </div>
				</div>
			</div>
			<div class="kia__collapsed">
			  <div class="kia__collapsed--head">Implementation Notes</div>
			  <div class="kia__collapsed--subhead">retrieves the dimensions for the KI dataset</div>
			  <br>
			  <div class="kia__collapsed--head">Response Format</div>
			  <div class="kia__collapsed--subhead">SDMX-ML (XML), SDMX-JSON</div>
			  <br>
			  <div class="kia__collapsed--head">HTTP Response</div>
			  <div class="kia__collapsed--subhead">Success Status Code: 200<br>Content: The response has the code list for the KI dataset</div>
			  <br>
			  <div class="kia__responses--left">
				  <div class="kia__collapsed--head">Sample Response Schema</div>

<textarea class="kia__collapsed--code-value">{
	"id": "string",
	"agency": "string",
	"version": "integer",
	"isFinal": "booealn",
	"name":
	{
		"lang": "string",
		"value": "string",
		"structure": {
			"id": "string",
			"agency": "string",
			"package": "datastructure",
			"class": "DataStructure"
		}
	}
}
</textarea>

			  </div>
			  <div class="kia__responses--right">
				  <div class="kia__collapsed--head">Sample Response Values</div>
<textarea class="kia__collapsed--code-value">{
	"id": "KI",
	"agency": "ADB",
	"version": "1.0",
	"isFinal": "false",
	"name":
	{
		"lang": "en",
		"value": "Key Indicators Database",
		"structure": {
			"id": "KI",
			"agency": "ADB",
			"package": "datastructure",
			"class": "DataStructure"
		}
	}
}
</textarea>
			  </div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="kia__call">
			<div class="kia__call--header">Data Structure Definition (DSD)</div>
			<div class="kia__call--description">Retrieves the DSD for the KI dataset - <span class="kia__link">View More <i class="fas fa-caret-down"></i></span></div>
			<div class="kia__well">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text get">GET &nbsp;{{url()}}</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="v1/sdmx/datastructure">
				  <div class="input-group-append">
				    <span class="input-group-text kia__copy">Copy &nbsp;<i class="fas fa-clipboard"></i></span>
				  </div>
				</div>
			</div>
			<div class="kia__collapsed">
			  <div class="kia__collapsed--head">Implementation Notes</div>
			  <div class="kia__collapsed--subhead">Retrieves the DSD for the KI dataset</div>
			  <br>
			  <div class="kia__collapsed--head">Response Format</div>
			  <div class="kia__collapsed--subhead">SDMX-ML (XML), SDMX-JSON</div>
			  <br>
			  <div class="kia__collapsed--head">HTTP Response</div>
			  <div class="kia__collapsed--subhead">Success Status Code: 200<br>Content: The response has the code list for the KI dataset</div>
			  <br>
			  <div class="kia__responses--left">
				  <div class="kia__collapsed--head">Sample Response</div>
<textarea class="kia__collapsed--code-value">{
	"name": "string",
	"components": 
	{
		"DimensionList": "array",
		"AttributeList": "array,
		"MeasureList": "array
	}
}
</textarea>
			  </div>
			  <div class="kia__responses--right">
				  <div class="kia__collapsed--head">Sample Response Value</div>
<textarea class="kia__collapsed--code-value">{
	"name": "Key Indicators Database",
	"components": 
	{
		"DimensionList": {
			"Dimension": "FREQ",
			"urn": "urn:sdmx:org.sdmx.infomodel.datastructure.Dimension=ADB(1.0)DimensionDescriptor",
			"position": "1",
			"ConceptIdentity": {
				"id": "FREQ",
				"maintainable_path": "ADB_FREQ",
				"maintainableParentVersion": "1.0",
				"agencyID": "ADB",
				package="conceptscheme",
				class="Concept"
			}
		}
	}
}
</textarea>
			  </div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="kia__call">
			<div class="kia__call--header">Concept Scheme</div>
			<div class="kia__call--description">Retrieves the concepts for the KI dataset - <span class="kia__link">View More <i class="fas fa-caret-down"></i></span></div>
			<div class="kia__well">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text get">GET &nbsp;{{url()}}</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="v1/sdmx/conceptscheme">
				  <div class="input-group-append">
				    <span class="input-group-text kia__copy">Copy &nbsp;<i class="fas fa-clipboard"></i></span>
				  </div>
				</div>
			</div>
			<div class="kia__collapsed">
			  <div class="kia__collapsed--head">Implementation Notes</div>
			  <div class="kia__collapsed--subhead">Retrieves the concept schemes for the KI dataset</div>
			  <br>
			  <div class="kia__collapsed--head">Response Format</div>
			  <div class="kia__collapsed--subhead">SDMX-ML (XML), SDMX-JSON</div>
			  <br>
			  <div class="kia__collapsed--head">HTTP Response</div>
			  <div class="kia__collapsed--subhead">Success Status Code: 200<br>Content: The response has the code list for the KI dataset</div>
			  <br>
			  <div class="kia__responses--left">
				  <div class="kia__collapsed--head">Sample Response</div>
<textarea class="kia__collapsed--code-value">{
	"conceptscheme": "name"
	{
		"concept": arrayData
	}
}
</textarea>
			  </div>
			  <div class="kia__responses--right">
				  <div class="kia__collapsed--head">Sample Response Value</div>
<textarea class="kia__collapsed--code-value">{
	"conceptscheme": "default scheme"
	{
		"concept": {
			"id": "FREQ",
			"urn": "urn:sdmx:org.sdmx.infomodel.conceptscheme.Concept=ADB:KI_CONCEPT(1.0).FREQ",
			{
				"Name": Frequency,
				"Description": "Indicates rate of recurrence at which observations occur (e.g. monthly, yearly, biannually, etc.)."
			}
		},
		"concept": {
			"id": "REF_AREA",
			"urn": "urn:sdmx:org.sdmx.infomodel.conceptscheme.Concept=ADB:KI_CONCEPT(1.0).REF_AREA",
			{
				"Name": Reference Area,
				"Description": "Reference Area: Specific areas (e.g. Country, Regional Grouping, etc) the observed values refer to. Reference areas can be determined according to different criteria (e.g.: geographical, economic, etc.)."
			}
		}
	}
}
</textarea>
			  </div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="kia__call">
			<div class="kia__call--header">Code List</div>
			<div class="kia__call--description">Retrieves the code lists for the KI dataset - <span class="kia__link">View More <i class="fas fa-caret-down"></i></span></div>
			<div class="kia__well">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text get">GET &nbsp;{{url()}}</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="v1/sdmx/codelist">
				  <div class="input-group-append">
				    <span class="input-group-text kia__copy">Copy &nbsp;<i class="fas fa-clipboard"></i></span>
				  </div>
				</div>
			</div>
			<div class="kia__collapsed">
			  <div class="kia__collapsed--head">Implementation Notes</div>
			  <div class="kia__collapsed--subhead">Retrieves the code list for the KI dataset</div>
			  <br>
			  <div class="kia__collapsed--head">Response Format</div>
			  <div class="kia__collapsed--subhead">SDMX-ML (XML), SDMX-JSON</div>
			  <br>
			  <div class="kia__collapsed--head">HTTP Response</div>
			  <div class="kia__collapsed--subhead">Success Status Code: 200<br>Content: The response has the code list for the KI dataset</div>
			  <br>
			  <div class="kia__responses--left">
				  <div class="kia__collapsed--head">Sample Response</div>
				  <textarea class="kia__collapsed--code-value">{&#013;&nbsp;&nbsp;&nbsp;&nbsp;"code list": {&#013;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"abberviated code": "code name"&#013;&nbsp;&nbsp;&nbsp;&nbsp;}&#013;}</textarea>
			  </div>
			  <div class="kia__responses--right">
				  <div class="kia__collapsed--head">Sample Response Value</div>
<textarea class="kia__collapsed--code-value">{
	"FREQ": {
		"A": "Annual",
		"SA": "Semi-Annual",
		"M": "Monthly"
	},
	"UNIT_MULT": {
		...
	}
}
</textarea>
			  </div>
			</div>
			<div class="clearfix"></div>
		</div>

	</div>
	<div class="kia__body">
		<h2 class="kia__h2 mt-2">Database end-points</h2>
		<p>The SDMX API can programmatically access the database and indicators that are available in the KI database.</p>
		<div class="kia__call">
			<div class="kia__call--header">Indicators</div>
			<div class="kia__call--description">These end-points retrieve the KI dataset - <span class="kia__link">View More <i class="fas fa-caret-down"></i></span></div>
			<div class="kia__well">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text get">GET &nbsp;{{url()}}</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="v1/sdmx/{indicator}">
				  <div class="input-group-append">
				    <span class="input-group-text kia__copy">Copy &nbsp;<i class="fas fa-clipboard"></i></span>
				  </div>
				</div>
			</div>
			<div class="kia__collapsed">
			  <div class="kia__collapsed--head">Implementation Notes</div>
			  <div class="kia__collapsed--subhead">This end-point requires {indicator} SDMX code to return the corresponding KI indicator dataset. Refer to the code list for SDMX indicator codes.</div><br>
			  <div class="kia__collapsed--head">Parameters</div>
			  <div class="kia__collapsed--subhead">
				<div class="kia__params mt-3">
				  	<div class="kia__params--header"><b>sdmx_format</b> = For viewing data in either <span class="kia__accent kia__accent--bg">generic</span> or <span class="kia__accent kia__accent--bg">compact</span> (structure specific) schema. Generic is the default value.</div>
				  	<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?sdmx_format=compact</span></small>
				</div>
			  	<div class="kia__params">
			  		<div class="kia__params--header"><b>country</b> = ISO Country code. Filters results by selected country. Multiple countries can be selected using the <span class="kia__accent kia__accent--bg">,</span> separator. Refer to code list for frequency names and codes.</div>
			  		<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?country=PHI</span></small><br>
			  		<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?country=PHI,BHU,SRI</span></small>
			  	</div>
				<div class="kia__params">
				  	<div class="kia__params--header"><b>year</b> = From year 2000 onwards. Returns data for the specified year(s). Multiple years can be selected using the <span class="kia__accent kia__accent--bg">,</span> separator. A range can be indicated using a <span class="kia__accent kia__accent--bg">:</span> separator.</div>
				  	<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?year=2005</span></small><br>
				  	<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?year=2005,2009</span></small><br>
				  	<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?year=2005,2009:2010</span></small>
				</div>
				<div class="kia__params">
				  	<div class="kia__params--header"><b>freq</b> = Frequency code. Refer to code list for frequency names and codes.</div>
				  	<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?frequency=A</span></small>
				</div>
				<!-- <div class="kia__params">
				  	<div class="kia__params--header"><b>um</b> = Unit multiplier. Indicates the magnitude in the units of measurement. Refer to code list for UOM names and codes.</div>
				  	<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?um=6</span></small>
				</div> -->
				<div class="kia__params">
				  	<div class="kia__params--header"><b>page</b> = Page number. For paging through large result-sets. This allows users to indicate the page number requested from the record-set.</div>
				  	<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?page=5</span></small>
				</div>
				<div class="kia__params">
				  	<div class="kia__params--header"><b>per_page</b> = For determining the number of results per page. The default setting is 50 results per page.</div>
				  	<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?per_page=100</span></small>
				</div>
				<div class="kia__params">
				  	<div class="kia__params--header">Multiple Parameters. It is possible to combine parameters using the <span class="kia__accent">&</span> sign.</div>
				  	<small>e.g. /api/v1/sdmx/POP_MID<span class="kia__accent">?country=PHI&yearstart=2005&yearend=2010</span></small>
				</div>
			  </div>
			</div>
		</div>

	</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function() { 
		$(".kia__link, .get").click(function() {
			toggleCollapsed($(this));
		});
		$(".kia__copy").click(function() {
			copyText = $(this).closest('.kia__well').find('input').val();
			copyText = '{{ url() }}/'+copyText;
			copyToClipboard(copyText);
			$(this).html('Copied &nbsp;<i class="fas fa-check"></i>');
			el = $(this);
			setTimeout(function(){
			  resetCopyButton($(el));
			}, 750);
		});
	});
	function toggleCollapsed(element) {
		el = element;
		console.log(el);
		el.closest('.kia__call').find('.kia__collapsed').slideToggle( "fast", function() {
			el = el.closest('.kia__call').find('.kia__link');
			if (el.hasClass('less')) {
				el.html('View More <i class="fas fa-caret-down"></i>');
				el.removeClass('less');
			} else {
				el.addClass(" less");
				el.html('View Less <i class="fas fa-caret-up"></i>');
			}
		});
	}
	function copyToClipboard(text) {
	  var $temp = $("<input>");
	  $("body").append($temp);
	  $temp.val(text).select();
	  document.execCommand("copy");
	  $temp.remove();
	}
	function resetCopyButton(element) {
		el = element;
		el.html('Copy &nbsp;<i class="fas fa-clipboard"></i>');
	}
</script>
@endsection
