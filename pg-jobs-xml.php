<?php
file_put_contents("alljobs.xml", fopen("https://www.michaelpage.it/sites/michaelpage.it/files/reports/job_advert_xml/combined_jobs.xml", 'r'));

$jobs = simplexml_load_file('alljobs.xml');
$xml = new SimpleXMLElement('<jobs/>');

foreach ( $jobs as $job ) {

	if ( preg_match("[PageGroup|Page Group]", $job->description->company) === 1 ) {


		$addJob = $xml->addChild('job');
		$addJob->addChild('uniqueJobID', (string)htmlspecialchars($job->uniqueJobID));
		$addJob->addChild('language', (string)htmlspecialchars($job->language));

		$location = $addJob->addChild('location');
		$location->addChild('code', (string)htmlspecialchars($job->location->code));
		$location->addChild('text', (string)htmlspecialchars($job->location->text));
		$location->addChild('term', (string)htmlspecialchars($job->location->term));

		$addJob->addChild('id', (int)$job->id);
		$addJob->addChild('ref', (int)$job->ref);
		$addJob->addChild('country', (string)htmlspecialchars($job->country));

		$description = $addJob->addChild('description');
		$description->addChild('role', (string)htmlspecialchars($job->description->role));

		$bulletPoints = $description->addChild('bulletPoints');
		$bulletPoints->addChild('bulletPoints_0', (string)htmlspecialchars($job->description->bulletPoints->bulletPoints_0));
		$bulletPoints->addChild('bulletPoints_1', (string)htmlspecialchars($job->description->bulletPoints->bulletPoints_1));

		$description->addChild('candidate', (string)htmlspecialchars($job->description->candidate));
		$description->addChild('company', (string)htmlspecialchars($job->description->company));
		$description->addChild('deal', (string)htmlspecialchars($job->description->deal));

		$addJob->addChild('status', (string)htmlspecialchars($job->status));
		$addJob->addChild('active', (string)htmlspecialchars($job->active));
		$addJob->addChild('client_authorised', (string)htmlspecialchars($job->client_authorised));
		$addJob->addChild('searchable', (string)htmlspecialchars($job->searchable));
		$addJob->addChild('title', (string)htmlspecialchars($job->title));
		$addJob->addChild('updated', (string)htmlspecialchars($job->updated));
		$addJob->addChild('published', (string)htmlspecialchars($job->published));

		$summary = $addJob->addChild('summary');
		$summary->addChild('content', (string)htmlspecialchars($job->summary->content));
		$summary->addChild('title', (string)htmlspecialchars($job->summary->title));

		$addJob->addChild('created', (string)htmlspecialchars($job->created));
		$addJob->addChild('brand', (string)htmlspecialchars($job->brand));

		$consultant = $addJob->addChild('consultant');
		$consultant->addChild('name', (string)htmlspecialchars($job->consultant->name));
		$consultant->addChild('email', (string)htmlspecialchars($job->consultant->email));
		$consultant->addChild('cvxemail', (string)$job->consultant->cvxemail);
		$consultant->addChild('office', (string)htmlspecialchars($job->consultant->office));
		$consultant->addChild('telephone', (string)htmlspecialchars($job->consultant->telephone));

		$addJob->addChild('contractType', (string)htmlspecialchars($job->consultant->contractType));

		$employer = $addJob->addChild('employer');
		$employer->addChild('name', (string)htmlspecialchars($job->employer->name));
		$employer->addChild('id', (string)$job->employer->id);
		$employer->addChild('hide', (string)$job->employer->hide);

		$industry = $addJob->addChild('industry');
		$industry->addChild('code', (string)htmlspecialchars($job->industry->code));
		$industry->addChild('term', (string)htmlspecialchars($job->industry->term));

		$addJob->addChild('international', (string)htmlspecialchars($job->international));

		$logoImage = $addJob->addChild('logoImage');
		$logoImage->addChild('type', (string)$job->logoImage->type);
		$logoImage->addChild('tmp_name', (string)$job->logoImage->tmp_name);
		$logoImage->addChild('name', (string)$job->logoImage->name);
		$logoImage->addChild('h', (string)$job->logoImage->h);
		$logoImage->addChild('w', (string)$job->logoImage->w);

		$minisite = $addJob->addChild('minisite');
		$minisite->addChild('type', (string)htmlspecialchars($job->minisite->type));
		$minisite->addChild('ref', (string)htmlspecialchars($job->minisite->ref));

		$addJob->addChild('productType', (string)htmlspecialchars($job->productType));

		$salary = $addJob->addChild('salary');
		$salary->addChild('max', (string)$job->salary->max);
		$salary->addChild('currency', (string)$job->salary->currency);
		$salary->addChild('min', (string)$job->salary->min);
		$salary->addChild('period', (string)$job->salary->period);
		$salary->addChild('show', (string)$job->salary->show);

		$sector = $addJob->addChild('sector');
		$sector->addChild('code', (string)htmlspecialchars($job->sector->code));
		$sector->addChild('term', (string)htmlspecialchars($job->sector->term));

		$subSector = $addJob->addChild('subSector');
		$subSector->addChild('code', (string)htmlspecialchars($job->subSector->code));
		$subSector->addChild('term', (string)htmlspecialchars($job->subSector->term));

		$addJob->addChild('job_level', (string)htmlspecialchars($job->job_level));
		$addJob->addChild('Contract_Duration', (string)htmlspecialchars($job->Contract_Duration));
		$addJob->addChild('Executive_NonExecutive', (string)htmlspecialchars($job->Executive_NonExecutive));
		$addJob->addChild('company_type', (string)htmlspecialchars($job->company_type));
		$addJob->addChild('Job_Detail_URL', (string)htmlspecialchars($job->Job_Detail_URL));
		$addJob->addChild('Job_Start_Date', (string)htmlspecialchars($job->Job_Start_Date));
		$addJob->addChild('Opportunity_Type', (string)htmlspecialchars($job->Opportunity_Type));
		

	}

}
Header('Content-type: text/xml');
print($xml->asXML());
$xml->asXml('pagegroupjobs.xml');