export function castRouteParams(route) {
    return {
        id: Number(route.params.id),
    };
}
