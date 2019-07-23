<?php

namespace App\Http\GraphQL\Queries;

use App\User;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UserQuery
{
    protected $attributes = [
        'name' => 'Users Query',
        'email' => 'A query of users'
    ];


    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ]
        ];
    }


    /**
     * Return a value for the field.
     *
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param array $args The arguments that were passed into the field.
     * @param GraphQLContext|null $context Arbitrary data that is shared between all fields of a single query.
     * @param ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     *
     * @return mixed
     */
    public function resolve($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
//        $where = function ($query) use ($args) {
//            if (isset($args['id'])) {
//                $query->where('id',$args['id']);
//            }
//            if (isset($args['email'])) {
//                $query->where('email',$args['email']);
//            }
//        };

        $user = User::select($args)->get();

        return $user;
    }
}
