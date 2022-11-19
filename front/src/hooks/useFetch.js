import { useCallback, useEffect, useState } from "react";

function useAsync(callback, dependencies = []) {
    const [error, setError] = useState();
    const [value, setValue] = useState();
    const [loading,setLoading]=useState(true);

    const callbackMemoized = useCallback(() => {
        setError(undefined);
        setValue(undefined);
        callback()
        .then(setValue)
        .catch(setError)
        .finally(()=>setLoading(false));
    }, dependencies);

    useEffect(() => {
        callbackMemoized()
    }, [callbackMemoized])

    return { error, value, loading }
}

const DEFAULT_OPTIONS = {
    headers: { "Content-Type": "application/json" },
};

export default function useFetch(url, options = {}, dependencies = []) {
    return useAsync(() => {
        return fetch(url, { ...DEFAULT_OPTIONS, ...options }).then(res => {
            if (res.ok) return res.json();
            return Promise.reject("ERROR");
        })
    }, dependencies)
}