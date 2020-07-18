<?php


namespace App\Http\Services;


use App\Models\Issue;
use App\Models\IssuesImage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class IssueService
{
    /**
     * @var UploaderService
     */
    private $uploaderService;

    /**
     * IssueService constructor.
     * @param UploaderService $uploaderService
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fill(Request $request, Issue $issue = null)
    {
        if (!$issue) {
            $issue = new Issue();
        }

        $issue->fill($request->all());

        $issue->save();

        if ($request->hasFile('images')) {
            $this->addIssueImages($request->file('images'), $issue);
        }

        return $issue;
    }

    /**
     * @param UploadedFile[] $images
     * @param Issue $issue
     */
    private function addIssueImages($images, Issue $issue)
    {
        $issuesImages = [];

        foreach ($images as $image) {
            $img = $this->uploaderService->upload($image, 'issues');
            $issuesImages[] = new IssuesImage(['path' => $img]);
        }

        $issue->images()->saveMany($issuesImages);
    }
}
