_faker.php()
{
    COMPREPLY=()
    local cur="${COMP_WORDS[COMP_CWORD]}"
    local prev="${COMP_WORDS[COMP_CWORD-1]}"
    local line=${COMP_LINE}
    local cmd="${1##*/}"
    local arguments="${COMP_WORDS[@]:1}"

    local opts="-l --locale -s --seed -p --pattern -d --delimiter -e --enclosure -E --escape -f --format -c --count"

    if [[ ${cur} == -* ]]; then
        COMPREPLY=( $(compgen -W "${opts}" -- ${cur}) )
        return 0
    fi

    if type awk >/dev/null 2>/dev/null; then
        local types=$(faker.php list-types | awk '{print $1}')
        COMPREPLY=( $(compgen -W "${types}" -- ${cur}) )
    fi

    return 0
}

complete -F _faker.php faker.php

