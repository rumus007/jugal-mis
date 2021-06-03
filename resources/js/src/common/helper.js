export const redirectTo = (route) => {
    window.location = route;
};

export const route = (name, params = []) => {
    if (!window.routes?.hasOwnProperty(name)) {
        throw Error(`Route ${name} not defined.`)
    }

    let url = window.routes[name]

    if (params.length === 0) {
        return url
    }

    params.map(value => {
        url = url.replace(/{[A-Za-z0-9_?]+}/, value)
    });

    return url
};

export const filterObject = (obj) => {
    for (const propName in obj) {
        if (obj[propName] === "" || obj[propName] === null || obj[propName] === undefined) {
            delete obj[propName];
        }
    }
    return obj;
};

export const apexChartYAxisNumericLabelFormatter = (value, decimalPoint = 1) => {
    if (value !== 0 && value % value.toFixed(decimalPoint) !== 0) {
        value = value.toFixed(decimalPoint)
    }
    return +value;
}
/**
 * 
 * @param {Function} queryParameter
 * formats the routes query parrams. 
 */
export const formatRouteUrl = ({...obj}) => {
    let formattedParams = {};
    Object.keys(obj).map((data) => {
        if (obj[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${obj[data].join(",")}`,
          };
        }
      });
    return formattedParams;
};

