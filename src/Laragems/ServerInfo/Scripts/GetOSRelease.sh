#!/bin/sh

OS=`uname -s`
OS_VERSION=`uname -r`
ARCH=`uname -m`

if [ "${OS}" = "Linux" ] ; then

    regex='([0-9]+)\.([0-9]+)\.([0-9]+)'
    [[ $(uname -r) =~ $regex ]]

    KERNEL_MAJOR_VERSION=${BASH_REMATCH[1]}
    KERNEL_MINOR_VERSION=${BASH_REMATCH[2]}
    KERNEL_BUILD_VERSION=${BASH_REMATCH[3]}

    KERNEL_VERSION="${KERNEL_MAJOR_VERSION}.${KERNEL_MINOR_VERSION}.${KERNEL_BUILD_VERSION}"

    if [ -f /etc/redhat-release ] && [ -f /etc/centos-release ] ; then
        DIST='CentOS'

        [[ $(cat /etc/centos-release | sed s/.*release\ // | sed s/\ .*//) =~ $regex ]]

        OS_MAJOR_VERSION=${BASH_REMATCH[1]}
        OS_MINOR_VERSION=${BASH_REMATCH[2]}
        OS_BUILD_VERSION=${BASH_REMATCH[3]}

        OS_VERSION="${OS_MAJOR_VERSION}.${OS_MINOR_VERSION}.${OS_BUILD_VERSION}"

    elif [ -f /etc/redhat-release ] && [ ! -f /etc/centos-release ] ; then
        DIST='RedHat'
        OS_VERSION=`cat /etc/redhat-release | sed s/.*release\ // | sed s/\ .*//`

    elif [ -f /etc/SuSE-release ] ; then
        DIST=`cat /etc/SuSE-release | tr "\n" ' '| sed s/VERSION.*//`
        OS_VERSION=`cat /etc/SuSE-release | tr "\n" ' ' | sed s/.*=\ //`

    elif [ -f /etc/mandrake-release ] ; then
        DIST='Mandrake'
        OS_VERSION=`cat /etc/mandrake-release | sed s/.*release\ // | sed s/\ .*//`

    elif [ -f /etc/debian_version ] ; then
        DIST="Debian `cat /etc/debian_version`"
        OS_VERSION=""
    fi

fi

JSON="{
    \"os\": \"${OS}\",
    \"dist\": \"${DIST}\",
    \"os_version\": \"${OS_VERSION}\",
    \"os_major_version\": ${OS_MAJOR_VERSION},
    \"os_minor_version\": ${OS_MINOR_VERSION},
    \"os_build_version\": ${OS_BUILD_VERSION},
    \"kernel_version\": \"${KERNEL_VERSION}\",
    \"kernel_major_version\": ${KERNEL_MAJOR_VERSION},
    \"kernel_minor_version\": ${KERNEL_MINOR_VERSION},
    \"kernel_build_version\": ${KERNEL_BUILD_VERSION},
    \"arch\": \"${ARCH}\"
}"

echo ${JSON}