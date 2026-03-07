import { Layout } from "@/components/layout/Layout";

const Terms = () => {
  return (
    <Layout>
      <section className="pt-32 pb-20 bg-background">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl mx-auto">
            <h1 className="font-display text-4xl font-bold text-foreground mb-8">Terms & Conditions</h1>
            
            <div className="prose prose-invert max-w-none space-y-6 text-muted-foreground">
              <p className="text-lg">
                Last updated: January 2024
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                1. Agreement to Terms
              </h2>
              <p>
                By accessing or using ZephyricsStudio's services, you agree to be bound by these Terms 
                and Conditions. If you disagree with any part of these terms, you may not access our services.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                2. Services
              </h2>
              <p>
                ZephyricsStudio provides web design, development, SEO, branding, and digital marketing 
                services. The specific scope of work will be outlined in individual project agreements.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                3. Intellectual Property
              </h2>
              <p>
                Upon full payment, clients receive ownership of final deliverables as specified in the 
                project agreement. ZephyricsStudio retains the right to display work in portfolios unless 
                otherwise agreed.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                4. Payment Terms
              </h2>
              <p>
                Payment terms will be specified in individual project proposals. Typically, projects 
                require a deposit before work begins, with the balance due upon completion or as 
                outlined in the agreement.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                5. Client Responsibilities
              </h2>
              <p>
                Clients are responsible for:
              </p>
              <ul className="list-disc pl-6 space-y-2">
                <li>Providing accurate information and timely feedback</li>
                <li>Ensuring they have rights to any content they provide</li>
                <li>Prompt payment as per agreed terms</li>
                <li>Reviewing and approving deliverables in a timely manner</li>
              </ul>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                6. Limitation of Liability
              </h2>
              <p>
                ZephyricsStudio shall not be liable for any indirect, incidental, special, or 
                consequential damages arising from the use of our services.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                7. Revisions and Changes
              </h2>
              <p>
                The number of revisions included in a project will be specified in the project proposal. 
                Additional revisions beyond the agreed scope may incur extra charges.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                8. Termination
              </h2>
              <p>
                Either party may terminate a project with written notice. In case of termination, 
                payment is due for all work completed up to the termination date.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                9. Changes to Terms
              </h2>
              <p>
                We reserve the right to modify these terms at any time. Changes will be effective 
                immediately upon posting to the website.
              </p>

              <h2 className="text-2xl font-display font-semibold text-foreground mt-8 mb-4">
                10. Contact
              </h2>
              <p>
                For questions about these Terms & Conditions, contact us at:
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

export default Terms;
