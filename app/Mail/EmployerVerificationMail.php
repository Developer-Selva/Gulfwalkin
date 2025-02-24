<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Employer;

class EmployerVerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    // Define the properties you need to pass
    public $employer;
    public $verificationCode;

    // Constructor to accept the employer and verification code
    public function __construct(Employer $employer)
    {
        $this->employer = $employer;
        $this->verificationCode = $employer->verification_code; // Get the verification code from the employer model
    }

    // Build the email
    public function build()
    {
        return $this->subject('Verify Your Employer Account')
                    ->view('emails.employer_verification'); // Reference the email view view.emails.employer_verification.blade.php
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Employer Verification Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        session()->flash('success', 'Your registration was successful!');
        return new Content(
            view: 'admin.employers.employers',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
