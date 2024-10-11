@echo off
echo Docker Control Script
echo.
echo Select an option:
echo 1. Start Docker Compose
echo 2. Stop Docker Compose
echo 3. Restart Docker Compose
echo 4. Exit
set /p choice="Enter your choice (1-4): "

if %choice%==1 (
    echo Starting Docker Compose...
    docker-compose up -d
    echo Docker Compose started.
) else if %choice%==2 (
    echo Stopping Docker Compose...
    docker-compose down
    echo Docker Compose stopped.
) else if %choice%==3 (
    echo Restarting Docker Compose...
    docker-compose down
    docker-compose up -d
    echo Docker Compose restarted.
) else if %choice%==4 (
    echo Exiting...
    exit
) else (
    echo Invalid choice. Exiting...
)
pause
