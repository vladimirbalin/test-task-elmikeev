<?php

namespace App\Http\Controllers;

use AmoCRM\Client\AmoCRMApiClient;
use App\Models\CatalogElement;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\Tag;

class MainController extends Controller
{
    public function __construct(
        private AmoCRMApiClient $apiClient
    )
    {
    }

    public function loadLeadsAndEntitiesToDb()
    {
        $leadsService = $this->apiClient->leads();
        $leads = $leadsService->get();

        foreach ($leads as $lead) {
            if (!is_null($lead->getCompany())) {
                $company = $lead->getCompany()->toArray();
                Company::updateOrCreate(['id' => $company['id']], $company);
            }
            if (!is_null($lead->getCatalogElementsLinks())) {
                $catalogElementsLinks = $lead->getCatalogElementsLinks()->toArray();
                foreach ($catalogElementsLinks as $elementLink) {
                    CatalogElement::updateOrCreate(['id' => $elementLink['id']], $elementLink);
                }
            }
            if (!is_null($lead->getTags())) {
                $tags = $lead->getTags()->toArray();

                foreach ($tags as $tag) {
                    Tag::updateOrCreate(['id' => $tag['id']], $tag);
                }
            }
            if (!is_null($lead->getContacts())) {
                $contacts = $lead->getContacts()->toArray();

                foreach ($contacts as $contact) {
                    Contact::updateOrCreate(['id' => $contact['id']], $contact);
                }
            }

            $lead = $lead->toArray();

            $leadEntity = Lead::firstOrNew(['id' => $lead['id']]);
            $leadEntity->fill($lead);
            $leadEntity->company_id = $company['id'];
            $leadEntity->save();
        }
    }

    public function showLeads()
    {
        $leads = Lead::with('company')->get();
        return view('welcome', compact('leads'));
    }
}
