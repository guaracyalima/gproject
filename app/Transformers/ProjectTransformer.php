<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 12/04/2017
 * Time: 22:19
 */

namespace CodeProject\Transformers;
use CodeProject\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends  TransformerAbstract
{
    protected $defaultIncludes = ['members'];

    /**
     * Transform the \ProjectMember entity
     * @param Project $project
     * @return array
     * @internal param \ProjectMember $model
     *
     */
    public function transform(Project $project)
    {
        return [
            'project_id'         => $project->id,
            'project'         => $project->name,
            'owner_id'         => $project->owner_id,
            'description'         => $project->description,
            'progress'         => $project->progress,
            'status'         => $project->status,
            'due_date'         => $project->due_date,

        ];
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

}