<?php

namespace App\Http\Controllers;

use App\DataTables\GroupsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGroupsRequest;
use App\Http\Requests\UpdateGroupsRequest;
use App\Repositories\GroupsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GroupsController extends AppBaseController
{
    /** @var  GroupsRepository */
    private $groupsRepository;

    public function __construct(GroupsRepository $groupsRepo)
    {
        $this->groupsRepository = $groupsRepo;
    }

    /**
     * Display a listing of the Groups.
     *
     * @param GroupsDataTable $groupsDataTable
     * @return Response
     */
    public function index(GroupsDataTable $groupsDataTable)
    {
        return $groupsDataTable->render('groups.index');
    }

    /**
     * Show the form for creating a new Groups.
     *
     * @return Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created Groups in storage.
     *
     * @param CreateGroupsRequest $request
     *
     * @return Response
     */
    public function store(CreateGroupsRequest $request)
    {
        $input = $request->all();

        $groups = $this->groupsRepository->create($input);

        Flash::success('Groups saved successfully.');

        return redirect(route('groups.index'));
    }

    /**
     * Display the specified Groups.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $groups = $this->groupsRepository->findWithoutFail($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        return view('groups.show')->with('groups', $groups);
    }

    /**
     * Show the form for editing the specified Groups.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $groups = $this->groupsRepository->findWithoutFail($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        return view('groups.edit')->with('groups', $groups);
    }

    /**
     * Update the specified Groups in storage.
     *
     * @param  int              $id
     * @param UpdateGroupsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGroupsRequest $request)
    {
        $groups = $this->groupsRepository->findWithoutFail($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        $groups = $this->groupsRepository->update($request->all(), $id);

        Flash::success('Groups updated successfully.');

        return redirect(route('groups.index'));
    }

    /**
     * Remove the specified Groups from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $groups = $this->groupsRepository->findWithoutFail($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        $this->groupsRepository->delete($id);

        Flash::success('Groups deleted successfully.');

        return redirect(route('groups.index'));
    }
}
