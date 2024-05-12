# Prayer Time Management System

## Overview

The Prayer Time Management System is a PHP application designed to manage and automate the playing of voiceovers for prayer times in different locations. It allows subscribers to manage their music boxes and schedule voiceovers for prayer times, which are retrieved from a government website.

## Features

- Subscriber management: Add, update, and delete subscribers.
- Box management: Add, update, and delete music boxes associated with subscribers.
- Voiceover management: Schedule voiceovers for prayer times in specific boxes and prayer zones.
- Automated voiceover generation: Automatically generate voiceovers for prayer times in advance.
- Error handling: Send email notifications for errors such as failed voiceover generation or prayer time retrieval.

## Database Schema

The application uses the following database tables:

- `Subscriber`: Stores information about subscribers.
- `Box`: Stores information about music boxes, including their association with subscribers.
- `Song`: Stores information about voiceovers scheduled for prayer times.

## Setup

1. Clone the repository:

2. Import the database schema using the provided SQL file (`schema.sql`).

3. Configure the database connection in `config/database.php`.

4. Update the API URL in `Service/PrayerService.php` with the correct URL of the government website.

5. Update the email address in `Util/EmailService.php` with the desired email address for error notifications.

## Usage

1. Access the application via the web server.

2. Use the API routes defined in `public/index.php` to interact with the application:
   - `/api/subscribers`: Get all subscribers.
   - `/api/boxes`: Get all boxes.
   - `/api/songs`: Get all songs.
   - `/api/create-subscriber`: Create a new subscriber.
   - `/api/create-box`: Create a new box.
   - `/api/create-song`: Create a new song.
   - Add more API routes as needed.

## Dependencies

The project does not use any external dependencies or frameworks. It is built with native PHP.

## Future Improvements

- Implement user authentication and authorization for secure access to the application.
- Enhance error handling and logging for better monitoring and troubleshooting.
- Implement caching mechanisms to improve performance and reduce API calls.
- Add support for multiple government websites or API endpoints for fetching prayer times.
- Implement a user interface for easier management of subscribers, boxes, and voiceovers.

## Contributors

- John Doe (@john_doe)
- Jane Smith (@jane_smith)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
