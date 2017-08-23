<?php

namespace App\DataTables;

use App\Models\Article;
use Form;
use Yajra\Datatables\Services\DataTable;

class ArticleDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'articles.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $articles = Article::query();

        return $this->applyScopes($articles);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'title' => ['name' => 'title', 'data' => 'title'],
            'post_date' => ['name' => 'post_date', 'data' => 'post_date'],
            'body' => ['name' => 'body', 'data' => 'body'],
            'password' => ['name' => 'password', 'data' => 'password'],
            'token' => ['name' => 'token', 'data' => 'token'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'author_gender' => ['name' => 'author_gender', 'data' => 'author_gender'],
            'post_type' => ['name' => 'post_type', 'data' => 'post_type'],
            'post_visits' => ['name' => 'post_visits', 'data' => 'post_visits'],
            'category' => ['name' => 'category', 'data' => 'category'],
            'category_short' => ['name' => 'category_short', 'data' => 'category_short'],
            'is_private' => ['name' => 'is_private', 'data' => 'is_private'],
            'writer_id' => ['name' => 'writer_id', 'data' => 'writer_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'articles';
    }
}
