# Tiktokdownloader
Can download TikTok videos using the link.

# 🔥 TikTok Video Downloader 🔥

This is a simple web-based TikTok video downloader that allows users to download TikTok videos directly by pasting the video URL. It uses the `tikwm.com` API to fetch video information and provide a download link.

## Features

* **Easy to Use:** Simply paste the TikTok video URL and click download.
* **Direct Download:** Provides a direct link to download the video.
* **Clear Interface:** User-friendly interface with clear instructions.
* **Error Handling:** Displays error messages for invalid URLs or API issues.

## How to Use

Follow these steps to download a TikTok video:

1.  **Copy the TikTok Video Link:** Open the TikTok app or website, find the video you want to download, and copy its link.
2.  **Paste the Link:** Paste the copied link into the "Enter TikTok Video URL" text box on the downloader page.
3.  **Click "Download":** Click the **Download** button.
4.  **"Video Ready to Download" Screen:** You'll be redirected to a screen indicating that the video is ready.
5.  **Click "Download Now":** Click the **Download Now** button. This will open the video in a new tab.
6.  **Download the Video:** In the new tab, right-click (or long-press on mobile) the video and select the "Save video as..." or "Download" option to save it to your device.

## Installation

To set up this TikTok Video Downloader on your own server, follow these steps:

1.  **Web Server with PHP:** Ensure you have a web server (like Apache or Nginx) with PHP installed and configured.
2.  **Clone or Download:**
    * **Clone the repository:**
        ```bash
        git clone <repository_url>
        ```
    * **Or, download the source code:** Get the `index.php` (or whatever you name the file containing the provided code) and `tikimg.jpg` files.
3.  **Place Files:** Place the `index.php` (or your PHP file) and `tikimg.jpg` in your web server's document root or a subdirectory accessible via a web browser.
4.  **Ensure cURL is Enabled:** The PHP script uses cURL to make API requests. Make sure the cURL extension is enabled in your `php.ini` file. You can usually do this by uncommenting the line:
    ```ini
    extension=curl
    ```
    After making changes to `php.ini`, restart your web server.
5.  **Access in Browser:** Open your web browser and navigate to the URL where you placed the files (e.g., `http://localhost/tiktok-downloader/index.php`).

## Technologies Used

* **PHP:** For backend logic and API interaction.
* **HTML:** For the structure of the web page.
* **CSS:** For styling and layout.
* **JavaScript:** For dynamic client-side interactions (e.g., clearing input, switching screens).
* **Tikwm API:** Used to retrieve TikTok video download links.

## Important Notes

* This downloader relies on the `tikwm.com` API. Its functionality is dependent on the API being active and accessible.
* The `tikimg.jpg` file is used as the background image. Make sure it's in the same directory as your PHP file or adjust the CSS `background-image` path accordingly.
* Always respect TikTok's terms of service and copyright laws when downloading videos.

## License

[You can add a license here, e.g., MIT, Apache 2.0, or state "No License" if you prefer.]
