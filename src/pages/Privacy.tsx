import { Layout } from "@/components/layout/Layout";

const Privacy = () => {
  return (
    <Layout>
      <section className="pt-32 pb-20 bg-background">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl mx-auto">
            <h1 className="font-display text-4xl font-bold text-foreground mb-8">Privacy Policy</h1>
            
            <div className="prose prose-invert max-w-none space-y-6 text-muted-foreground">
              <p className="text-lg">
                Last updated: January 2024
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                1. Information We Collect
              </h2>
              <p>
                We collect information you provide directly to us, including your name, email address, 
                company name, and any other information you choose to provide when contacting us or 
                using our services.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                2. How We Use Your Information
              </h2>
              <p>
                We use the information we collect to:
              </p>
              <ul className="list-disc pl-6 space-y-2">
                <li>Respond to your inquiries and provide customer support</li>
                <li>Send you updates about our services</li>
                <li>Improve our website and services</li>
                <li>Comply with legal obligations</li>
              </ul>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                3. Information Sharing
              </h2>
              <p>
                We do not sell, trade, or otherwise transfer your personal information to third parties 
                without your consent, except as necessary to provide our services or as required by law.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                4. Data Security
              </h2>
              <p>
                We implement appropriate security measures to protect your personal information. However, 
                no method of transmission over the Internet is 100% secure.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                5. Cookies
              </h2>
              <p>
                Our website may use cookies to enhance your experience. You can choose to disable cookies 
                through your browser settings, though this may affect some functionality.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                6. Your Rights
              </h2>
              <p>
                You have the right to access, correct, or delete your personal information. 
                Contact us at hello@zephyricsstudio.com for any privacy-related requests.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                7. Changes to This Policy
              </h2>
              <p>
                We may update this privacy policy from time to time. We will notify you of any changes 
                by posting the new policy on this page.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                8. Contact Us
              </h2>
              <p>
                If you have any questions about this Privacy Policy, please contact us at:
                <br />
                <a href="mailto:hello@zephyricsstudio.com" className="text-primary hover:underline">
                  hello@zephyricsstudio.com
                </a>
              </p>
            </div>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default Privacy;
